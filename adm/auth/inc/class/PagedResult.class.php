<?php

class PagedResult
{
	private $itemsPerPage = 1;
	private $pageParam = 'pg';
	private $page = 1;
	private $pagerLength = 8;
	private $url = array();
	
	private $ready = FALSE;
	
	private $sql;
	private $itemsCount;
	private $pagesCount;
	private $pager;
	private $result;
	
	public function __construct($itemsPerPage = 10, $pageParam = 'pg')
	{
		$this->setItemsPerPage($itemsPerPage);
		$this->setPageParam($pageParam);
		$this->setUrl();
	}
	
	public function query($args)
	{
		if (!$this->isReady()) {
			$this->sql = dibi::translate($args);
			$this->setItemsCount();
			$this->pagesCount = (int)ceil($this->itemsCount / $this->itemsPerPage);
			$this->page = max(1, min($this->page, $this->pagesCount));
			$this->setPager();
			$this->setResult();
			$this->ready = TRUE;
		}
		return $this->getResult();
	}
	
	public function flush()
	{
		$this->ready = FALSE;
		$this->sql = NULL;
		$this->itemsCount = NULL;
		$this->pagesCount = NULL;
		$this->pager = NULL;
		$this->result = NULL;
	}
	
	public function getPager()
	{
		if ($this->isReady()) {
			return $this->pager;
		}
	}
	
	public function getResult()
	{
		if ($this->isReady()) {
			return $this->result;
		}
	}
//------------------------------------------------------------------------------
	public function setItemsPerPage($itemsPerPage)
	{
		if (!$this->isReady()) {
			$this->itemsPerPage = max(1, (int)$itemsPerPage);
		}
	}
	
	public function setPageParam($pageParam)
	{
		if (!$this->isReady()) {
			$this->pageParam = (string)$pageParam;
			if (isset($_GET[$this->pageParam])) {
				$this->setPage($_GET[$this->pageParam]);
			} else {
				$this->setPage(1);
			}
		}
	}
	
	public function setPage($page)
	{
		if (!$this->isReady()) {
			$this->page = max(1, (int)$page);
		}
	}
	
	public function setUrl()
	{
		if (!$this->isReady()) {
			$this->url = parse_url($_SERVER['REQUEST_URI']);
			if (isset($this->url['query'])) {
				parse_str($this->url['query'], $this->url['query']);
			} else {
				$this->url['query'] = array();
			}
		}
	}
//------------------------------------------------------------------------------	
	private function setItemsCount()
	{
		if (preg_match('/SELECT\s+.+?(FROM.+)$/s', $this->sql, $matches)) {
			$sql = 'SELECT count(*) AS itemsCount ' . $matches[1];
			$result = dibi::nativeQuery($sql);
			$this->itemsCount = $result->fetchSingle();
		}
	}
	
	private function setPager()
	{
		$showAll = $this->pagesCount <= $this->pagerLength;
		
		$min = $showAll ? 1 : max(1, $this->page - $this->pagerLength/2);
		$max = $showAll ? $this->pagesCount : min($this->pagesCount, ($this->page + $this->pagerLength/2));
		if ($min < $this->pagerLength/2) {
			$max = min($this->pagesCount, ($min + $this->pagerLength));
		}
		if ($max > $this->pagesCount - $this->pagerLength/2) {
			$min = max(1, ($max - $this->pagerLength));
		}
		
		$showFirst = $min > 1;
		$showPrev = $this->page > 1;
		$showNext = $this->page < $this->pagesCount;
		$showLast = $max < $this->pagesCount;
		
		$this->pager = '<div class="pager">';
		if ($showFirst) {
			$this->pager.= $this->buildPagerLink(1, 1);
		}
		if ($showPrev) {
			$this->pager.= $this->buildPagerLink($this->page - 1, 'předchozí');
		}
		for ($i = $min; $i <= $max; $i++) {
			$this->pager.= $this->buildPagerLink($i, $i);
		}
		if ($showNext) {
			$this->pager.= $this->buildPagerLink($this->page + 1, 'další');
		}
		if ($showLast) {
			$this->pager.= $this->buildPagerLink($this->pagesCount, $this->pagesCount);
		}
		$this->pager.= '</div>';
	}
	
	private function setResult()
	{
		$sql = $this->sql . ' LIMIT ' . $this->itemsPerPage;
		if ($this->page !== 1) {
			$sql.= ' OFFSET ' . (($this->page - 1) * $this->itemsPerPage);
		}
		$this->result = dibi::nativeQuery($sql);
	}
	
	private function isReady()
	{
		return  $this->ready;
	}
	
	private function buildPagerLink($key, $text)
	{
		$param = ($key == 1) ? NULL : $key;
		return '<a href="' . $this->buildUrl(array($this->pageParam => $param)) . '"' 
			. ($key == $this->page ? ' class="act"' : '') . '>' . $text . '</a> ';
	}
	
	private function buildUrl($params)
	{
		$url = $this->url['path'];
		$query = $this->url['query'];
		foreach ($params as $key => $val) {
			if (is_null($val)) {
				unset($query[$key]);
			} else {
				$query[$key] = $val;
			}
		}
		if (!empty($query)) {
			$url.= '?' . http_build_query($query);
		}
		return $url;
	}
}