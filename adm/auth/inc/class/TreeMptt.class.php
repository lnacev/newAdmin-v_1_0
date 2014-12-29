<?php
/*
Tree: Modified Preorder Tree Traversal
version 1: one tree

DB tables:
tree_mptt_tree(id, item_id, parent_id, lft, rgt, lvl)
tree_mptt_item(id, name[, ...])

Methods:
v getRoot()
v getItem($id), getParent($id), getBreadcrumbs($id), getSubTree([$id = NULL])
v getFirstChild($parentId), getLastChild($parentId), getChildren($parentId), getFirstNChildren($parentId, $n)
v getSize([$id = NULL])
v insertItem($data, $parentId), insertBefore($data, $referenceId), insertAfter($data, $referenceId)
v moveSubTree($id, $parentId)
v deleteSubTree($id)
*/
//------------------------------------------------------------------------------
class TreeMptt
{
	private $treeTableName;
	private $itemTableName;
	private $sItemColumns;
//------------------------------------------------------------------------------
	public function __construct($treeTableName = 'tree_mptt_tree', $itemTableName = 'tree_mptt_item', $itemColumns = array('name'))
	{
		$this->treeTableName = $treeTableName;
		$this->itemTableName = $itemTableName;
		unset($itemColumns['id']);
		$this->sItemColumns = 'i.' . implode(', i.', $itemColumns);
	}
//------------------------------------------------------------------------------
	public function getRoot()
	{
		return $this->itemQuery("SELECT t.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->itemTableName} i ON t.item_id = i.id WHERE t.parent_id IS NULL");
	}
	
	public function getItem($id)
	{
		return $this->itemQuery("SELECT t.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->itemTableName} i ON t.item_id = i.id WHERE t.id = $id");
	}
	
	public function getParent($id)
	{
		return $this->itemQuery("SELECT p.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->treeTableName} p ON t.parent_id = p.id INNER JOIN {$this->itemTableName} i ON p.item_id = i.id WHERE t.id = $id");
	}
	
	public function getBreadcrumbs($id)
	{
		$item = $this->getItemInterval($id);
		return $this->itemsQuery("SELECT t.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->itemTableName} i ON t.item_id = i.id WHERE t.lft <= $item[lft] AND $item[rgt] <= t.rgt ORDER BY t.lft ASC");
	}
	
	public function getSubTree($id = NULL)
	{
		if (is_null($id)) {
			return $this->itemsQuery("SELECT t.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->itemTableName} i ON t.item_id = i.id ORDER BY t.lft ASC");
		} else {
			$item = $this->getItemInterval($id);
			return $this->itemsQuery("SELECT t.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->itemTableName} i ON t.item_id = i.id WHERE $item[lft] <= t.lft and t.rgt <= $item[rgt] ORDER BY t.lft ASC");
		}
	}
	
	public function getFirstChild($parentId)
	{
		return $this->itemQuery("SELECT t.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->itemTableName} i ON t.item_id = i.id WHERE t.parent_id = $parentId ORDER BY t.lft ASC LIMIT 1");
	}
	
	public function getLastChild($parentId)
	{
		return $this->itemQuery("SELECT t.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->itemTableName} i ON t.item_id = i.id WHERE t.parent_id = $parentId ORDER BY t.lft DESC LIMIT 1");
	}
	
	public function getChildren($parentId)
	{
		return $this->getFirstNChildren($parentId);
	}
	
	public function getFirstNChildren($parentId, $n = NULL)
	{
		$limit = is_null($n) ? "" : "LIMIT $n";
		return $this->itemsQuery("SELECT t.*, {$this->sItemColumns} FROM {$this->treeTableName} t INNER JOIN {$this->itemTableName} i ON t.item_id = i.id WHERE t.parent_id = $parentId ORDER BY t.lft ASC $limit");
	}
	
	public function getSize($id = NULL)
	{
		$where = is_null($id) ? "WHERE parent_id IS NULL" : "WHERE id = $id";
		return (int)$this->fieldQuery("SELECT (t.rgt - t.lft + 1) / 2 size FROM {$this->treeTableName} t $where");
	}
//------------------------------------------------------------------------------
	public function addItem($data, $parentId)
	{
		mysql_query("START TRANSACTION");
		if (FALSE === $itemId = $this->addItemItem($data)) {
			mysql_query("ROLLBACK");
			return FALSE;
		}
		
		if (!is_null($parentId)) {
			$parent = $this->itemQuery("SELECT * FROM {$this->treeTableName} WHERE id = $parentId FOR UPDATE");
			mysql_query("UPDATE {$this->treeTableName} SET lft = lft + 2 WHERE $parent[rgt] < lft");
			mysql_query("UPDATE {$this->treeTableName} SET rgt = rgt + 2 WHERE $parent[rgt] <= rgt");
			mysql_query("INSERT INTO {$this->treeTableName} (parent_id, item_id, lft, rgt, lvl) VALUES ($parentId, $itemId, $parent[rgt], $parent[rgt]+1, $parent[lvl]+1)");
			$id = mysql_insert_id();
		} else {
			mysql_query("INSERT INTO {$this->treeTableName} (item_id, lft, rgt, lvl) VALUES ($itemId, 1, 2, 0)");
			$id = mysql_insert_id();
		}
		mysql_query("COMMIT");
		return $id;
	}
	
	public function addItemBefore($data, $referenceId)
	{
		mysql_query("START TRANSACTION");
		$itemId = $this->addItemItem($data);
		$reference = $this->itemQuery("SELECT * FROM {$this->treeTableName} WHERE id = $referenceId FOR UPDATE");
		mysql_query("UPDATE {$this->treeTableName} SET lft = lft + 2 WHERE $reference[lft] <= lft");
		mysql_query("UPDATE {$this->treeTableName} SET rgt = rgt + 2 WHERE $reference[lft] < rgt");
		mysql_query("INSERT INTO {$this->treeTableName} (parent_id, item_id, lft, rgt, lvl) VALUES ($reference[parent_id], $itemId, $reference[lft], $reference[lft]+1, $reference[lvl])");
		mysql_query("COMMIT");
	}
	
	public function addItemAfter($data, $referenceId)
	{
		mysql_query("START TRANSACTION");
		$itemId = $this->addItemItem($data);
		$reference = $this->itemQuery("SELECT * FROM {$this->treeTableName} WHERE id = $referenceId FOR UPDATE");
		mysql_query("UPDATE {$this->treeTableName} SET lft = lft + 2 WHERE $reference[rgt] < lft");
		mysql_query("UPDATE {$this->treeTableName} SET rgt = rgt + 2 WHERE $reference[rgt] < rgt");
		mysql_query("INSERT INTO {$this->treeTableName} (parent_id, item_id, lft, rgt, lvl) VALUES ($reference[parent_id], $itemId, $reference[rgt]+1, $reference[rgt]+2, $reference[lvl])");
		mysql_query("COMMIT");
	}
//------------------------------------------------------------------------------
	public function moveSubTree($id, $parentId)
	{
		mysql_query("START TRANSACTION");
		$subTreeRoot = $this->itemQuery("SELECT * FROM {$this->treeTableName} WHERE id = $id FOR UPDATE");
		$subTreeIds = $this->getColumn($this->itemsQuery("SELECT id FROM {$this->treeTableName} WHERE $subTreeRoot[lft] <= lft AND rgt <= $subTreeRoot[rgt] FOR UPDATE"), 'id');
		$parent = $this->itemQuery("SELECT * FROM {$this->treeTableName} WHERE id = $parentId FOR UPDATE");
		$diff = $subTreeRoot['rgt'] - $subTreeRoot['lft'] + 1;
		$lvl = $parent['lvl'] + 1 - $subTreeRoot['lvl'];
		$moveDiff = $parent['rgt'] - $subTreeRoot['rgt'] - 1;
		if (($parent['lft'] < $subTreeRoot['lft'] && $subTreeRoot['rgt'] < $parent['rgt']) || $subTreeRoot['rgt'] < $parent['lft']) {
			mysql_query("UPDATE {$this->treeTableName} SET lft = lft - $diff WHERE $subTreeRoot[rgt] < lft AND lft < $parent[rgt]");
			mysql_query("UPDATE {$this->treeTableName} SET rgt = rgt - $diff WHERE $subTreeRoot[rgt] < rgt AND rgt < $parent[rgt]");
			mysql_query("UPDATE {$this->treeTableName} SET lft = lft + $moveDiff, rgt = rgt + $moveDiff, lvl = lvl + $lvl WHERE id IN(" . implode(',', $subTreeIds) . ")");
			mysql_query("UPDATE {$this->treeTableName} SET parent_id = $parent[id] WHERE id = $subTreeRoot[id]");
		} else if ($parent['rgt'] < $subTreeRoot['lft']) {
			mysql_query("UPDATE {$this->treeTableName} SET lft = lft + $diff WHERE $parent[rgt] < lft AND lft < $subTreeRoot[lft]");
			mysql_query("UPDATE {$this->treeTableName} SET rgt = rgt + $diff WHERE $parent[rgt] <= rgt AND rgt < $subTreeRoot[lft]");
			mysql_query("UPDATE {$this->treeTableName} SET lft = lft + $moveDiff + $diff, rgt = rgt + $moveDiff + $diff, lvl = lvl + $lvl WHERE id IN(" . implode(',', $subTreeIds) . ")");
			mysql_query("UPDATE {$this->treeTableName} SET parent_id = $parent[id] WHERE id = $subTreeRoot[id]");
		} else {
			mysql_query("COMMIT");
			return FALSE;
		}
		mysql_query("COMMIT");
		return TRUE;
	}
//------------------------------------------------------------------------------
	public function deleteSubTree($id)
	{
		mysql_query("START TRANSACTION");
		$subRoot = $this->itemQuery("SELECT * FROM {$this->treeTableName} WHERE id = $id FOR UPDATE");
		mysql_query("DELETE FROM {$this->treeTableName} WHERE $subRoot[lft] <= lft AND rgt <= $subRoot[rgt]");
		$diff = $subRoot['rgt'] - $subRoot['lft'] + 1;
		mysql_query("UPDATE {$this->treeTableName} SET lft = lft - $diff WHERE $subRoot[rgt] < lft");
		mysql_query("UPDATE {$this->treeTableName} SET rgt = rgt - $diff WHERE $subRoot[rgt] < rgt");
		mysql_query("COMMIT");
	}
//------------------------------------------------------------------------------
	private function addItemItem($data)
	{
		if (empty($data['name'])) {
			return FALSE;
		}
		
		$query = "SELECT id FROM {$this->itemTableName} WHERE name = '$data[name]'";
		if ($result = mysql_query($query) AND 0 !== mysql_num_rows($result)) {
			return (int)mysql_result($result, 0);
		}
		
		$q = array();
		foreach ($data as $key => $val) {
			$q[] = "`$key` = '$val'";
		}
		$query = "INSERT INTO {$this->itemTableName} SET" . implode(', ', $q);
		$result = mysql_query($query);
		return mysql_insert_id();
	}
	
	private function getItemInterval($id)
	{
	 return $this->itemQuery("SELECT t.lft, t.rgt FROM {$this->treeTableName} t WHERE t.id = $id");
	}
	
	private function getColumn($rows, $column)
	{
		$ret = array();
		foreach($rows as $key => $val){
			$ret[$key] = $val[$column];
		}
		return $ret;
	}
	
	private function fieldQuery($query)
	{
		$result = mysql_query($query);
		return mysql_result($result, 0);
	}
	
	private function itemQuery($query)
	{
		$result = mysql_query($query);
		return mysql_fetch_assoc($result);
	}
	
	private function itemsQuery($query)
	{
		$result = mysql_query($query);
		$rows = array();
		while ($row = mysql_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return empty($rows) ? FALSE : $rows;
	}
/* ******************************************* */
public function getSubTreeIds($id = NULL)
    {
        if (is_null($id)) {
            return $this->fieldQuery("SELECT GROUP_CONCAT(t.id) FROM {$this->treeTableName} t");
        } else {
            $item = $this->getItemInterval($id);
            return $this->fieldQuery("SELECT GROUP_CONCAT(t.id) FROM {$this->treeTableName} t WHERE $item[lft] <= t.lft and t.rgt <= $item[rgt]");
        }
    }
/* ******************************************* */	
}
//------------------------------------------------------------------------------