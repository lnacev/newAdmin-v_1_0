<?php
  
class Pager
{
  /* 
    nasledujici atributy je potreba nastavit pred volanim databind 
    (vetsina je ale nepovinna)
  */ 
  /** SQL prikaz pro vyber dat pred strankovanim, nesmi pouzivat LIMIT */
  public $SelectCommand; 
  /** 
   * SQL prikaz na vypocitani poctu zaznamu lze nechat 
   * nenastaveny, v tom pripade se vygeneruje v metode DataBind z 
   * SelectCommandu
   */ 
  public $CountCommand;
  /** Pocet zaznamu na strance */
  public $PageSize = 10;
  /** Parametr URL, ze ktereho se cte cislo akt. stranky */
  public $UrlParameterName;
  /** atribut ID, ktery bude mit <div> kolem pageru */
  public $PagerID = "PagerId";
  /** atribut Class, ktery bude mit <div> kolem pageru */
  public $PagerCssClass = "PagerClass";
  /**
   * zarovnani <div> kolem pageru - hodnota text-align v atributu style,
   * hodnota inherit znamena, ze div tento atribut 
   * vubec mit nebude
   */
  public $PagerAlign = "inherit";
  /** css trida pouzita pro vykresleni soucasne stranky */
  public $CurrentPageCssClass;
  /** priznak strankovani bez pouziti modu */
  public $BasicPaging = 1;
  /** nahrazovat entity na vystupu */
  public $HtmlSpecialChars = 0;
  
  /* 
    metody get_TargetedPage, get_ItemCount a get_PageCount ma smysl
    pouzit az po zavolani DataBind, kdy jsou nastaveny prislusne atributy
  */
  /** pozadovana stranka - precteno z parametru URL */
  private $targetedPage = 1;
    public function get_TargetedPage() { return $this->targetedPage; }
  /** pocet radku nestrankovane vysledkove sady */
  private $itemCount = 0;
    public function get_ItemCount() { return $this->itemCount; }
  /** celkovy pocet stranek = itemCount/PageSize */
  private $pageCount = 0;
    public function get_PageCount() { return $this->pageCount; }

  /** 
   * Pole pouzitych modu strankovani 
   * @see AddPagerMode
   * @see ClearPagerModes
   */
  public $_modes;
  /** vysledkova sada - ziskana v metode DataBind **/
  private $ResultSet = NULL;
  /** 
   * url prefix pro pager - zachovany vsechny atributy krome toho, 
   * ktery prislusi pageru 
   */
  private $prefix;
  /** 
   * priznak, zda bude parametr pageru prvnim parametrem v url
   */ 
  private $first = 0;
  
  /**
   * konstruktor - parametry jsou SQL prikaz na vyber vysledkove 
   * sady a parametr URL, ve kterem bude cislo aktualni stranky
   * @param SelectCommand - SQL dotaz, ktery vraci vsechny zaznamy, ktere maji byt strankovany 
   *                        (tedy vsechny, ne jen jednu stranku)
   * @param UrlParameterName - parametr, ktery bude cten z URL a zjisti se z nej, ktera stranka 
   *                           je prave vybrana (doporucene hodnoty napr. "strana", "page" apod.) 
   */
  public function __construct(
    $SelectCommand, 
    $UrlParameterName)
  {
    $this->SelectCommand = $SelectCommand;
    $this->UrlParameterName = $UrlParameterName;
    $this->_modes = array();
  }
  
  /** 
   * Z konstruktoru predaneho SelectCommandu vytvori upraveny dotaz, ktery vraci pouze
   * jednu stranku vysledkove sady. Dale vytvori CountCommand (pokud nebyl CountCommand
   * nastaven explicitne), ktery je pouzit k spocitani vsech prvku, ktere vraci SelectCommand.
   * Je vypocitan celkovy pocet stranek plne vysledkove sady (pageCount) a z databaze
   * je ziskana pozadovana stranka vysledkove sady (ResultSet)
   */
  public function DataBind()
  {
    // priprava prikazu pro spocitani zaznamu,
    // pokud nebyl zadan zvenci
    if (!$this->CountCommand || $this->CountCommand == "")
    {
      $this->CountCommand = preg_replace(
        '@SELECT (.*) FROM@', 
        'SELECT COUNT(*) AS Count FROM', 
        $this->SelectCommand);
    }  
    //zjisteni cisla aktualni stranky
    if (isset($_GET[$this->UrlParameterName]))
      $this->targetedPage = 
        (int)($_GET[$this->UrlParameterName]);
    else
      $this->targetedPage = 1;
    if ($this->targetedPage == 0)
      $this->targetedPage = 1;
    //zjisteni poctu zaznamu
    $c = (mysql_fetch_object(
      mysql_query($this->CountCommand)));
    $this->itemCount = $c->Count;
    //vypocet poctu stranek
    $this->pageCount = 
      (int) (($c->Count + $this->PageSize - 1) / $this->PageSize);
    if ($this->targetedPage > $this->pageCount)
      $this->targetedPage = 1;
    //vypocet parametru pro LIMIT
    $firstrow = 
      ($this->targetedPage - 1) * $this->PageSize;
    //ziskani pozadovane stranky
    $this->ResultSet = 
      mysql_query("$this->SelectCommand ".
                  " LIMIT $firstrow, $this->PageSize" );
                  
    //analyza url - zjisteni prefixu
    $hrefprefix = $_SERVER['SCRIPT_NAME'];
    $this->first=1;
    foreach ( $_GET as $key=>$value) 
    {
      if ($key == $this->UrlParameterName)
        continue;
    	if ($this->first)
    	{
    	 $hrefprefix .= "?".$key."=".$value;
    	 $this->first = 0; 
    	}
    	else
    	 $hrefprefix .= "&".$key."=".$value;
    }
    $this->prefix = $hrefprefix;
  }
  
  /**
   * Vypise ladici informace - predevsim pouzite SQL prikazy
   */
  public function DebugPrint($htmlmode = 1)  
  {
    $firstrow = ($this->targetedPage - 1) * $this->PageSize;
    
    
    echo "Pager debug print: <br />";
    echo "<ul>";
    echo "  <li>Targeted page: ".$this->targetedPage."</li>";
    echo "  <li>Page count: ".$this->pageCount."</li>";
    echo "  <li>Select command: ".$this->SelectCommand."</li>";
    echo "  <li>Select page command: ".$this->SelectCommand." LIMIT $firstrow, $this->PageSize </li>";
    echo "  <li>Count command: ".$this->CountCommand."</li>";
    echo "  <li>Url prefix: ".$this->prefix."</li>";
    echo "</ul>";
  }

  /**
   * Postupne vraci radky z vysledkove sady (jako objekty - fetch_object).
   * Dava smysl az po zavolani DataBind()
   * @return radek vysledkove sady jako objekt 
   */
  public function GetOne()
  {
    $obj = mysql_fetch_object($this->ResultSet);
  	if ($obj == null || !($this->HtmlSpecialChars))
  		return $obj;
  	else 
  	{
  		foreach ($obj as $field => $value)
  			$obj->$field = htmlspecialchars($value);
  		return $obj;	
  	}
  }
  
  /**
   * vrati vsechny vysledky jako pole objektu
   *
   * @return array of object - vysledky
   */
  public function GetAll()
  {
	$a = null;
	$i = 0;
	while ($obj = $this->GetOne())
	{
		$a[$i] = $obj;
		$i++;
	}
	return $a;
  }
  
  /**
   * Pomocna metoda pro vytvoreni odkazu na urcitou stranku.
   * Dava smysl az po volani DataBind()
   * @param page - stranka, na kterou bude odkazovano
   * @param anchoringText - text odkazu
   * @param cssClass - css trida odkazu
   */
  public function prepareLink(
    $page, 
    $anchoringText, 
    $cssClass)
  { 
    $prefix = $this->prefix;
  	$s = "";
    if ($page != $this->targetedPage)
    {
      if ($page == 1)
        $h = $prefix;
      else {
        if ($this->first)
          $h = $prefix."?".$this->UrlParameterName."=".$page;
        else
          $h = $prefix."&".$this->UrlParameterName."=".$page;
      }
      if ($cssClass != "" && $cssClass)
        $css = " class=\"$cssClass\"" ;
      else $css="";
      return "<a href=\"$h\"$css>$anchoringText</a> ";
    } else {
      if ($this->CurrentPageCssClass && 
          $this->CurrentPageCssClass != "")
      {
        $s.= "<span class=\"$this->CurrentPageCssClass\">";
        $s.=  $anchoringText;
        $s.=  "</span> ";
      } else 
      if ($cssClass && 
          $cssClass != "")
      {
        $s.= "<span class=\"$cssClass\">";
        $s.=  $anchoringText;
        $s.=  "</span> ";
      }
      else
        $s.=  $anchoringText." ";
      return $s;
    }
  }
  
  /**
   * Vypise pager do tela stranky. Iteruje pres jednotlive mody
   */ 
  public function DrawPager()
  {
    if ($this->BasicPaging)
    {
      //pokud uzivatel zadne mody nenastavil, nastavi se zakladni
      //mody PrevNext, FirstLast a Default
      $this->AddPagerMode(new FirstLastPagerMode);
      $this->AddPagerMode(new PrevNextPagerMode);
      $this->AddPagerMode(new DefaultPagerMode);
    }
    
   //vykresleni div tagu kolem pageru s odpovidajicimi atributy
    if ($this->PagerID && $this->PagerID != "")
      $id = " id=\"$this->PagerID\"";
    else $id ="";
    if ($this->PagerCssClass && $this->PagerCssClass != "")
      $class = " class=\"$this->PagerCssClass\"";
    else $class = "";
    if ($this->PagerAlign != "inherit") 
    	$align = " style=\"text-align: $this->PagerAlign\"";
    else
      $align ="";
    echo "<div $id $class $align >";
  
    //vykresleni odkazu PRED aktualni strankou - v poradi pridavani modu
    foreach ($this->_modes as $mode)
    {
      $mode->WriteFirstPart();
    }
    //aktualni stranka - muze mit css tridu
    if ($this->CurrentPageCssClass && 
        $this->CurrentPageCssClass != "")
    {
      echo "<span class=\"$this->CurrentPageCssClass\">";
      echo $this->targetedPage;
      echo "</span> ";
    }
    else
    {  
      echo $this->targetedPage." ";
    }
    //vykresleni odkazu ZA aktualni strankou - v opacnem poradi pridavani modu
    foreach (array_reverse($this->_modes) as $mode)
    {
      $mode->WriteSecondPart();
    }  
    //uzavreni bloku pageru
    echo "</div>";
  }
    
  /**
   * Prida pageru mod strankovani. 
   * Zalezi na poradi pridavani jednotlivych modu - ty predane jako prvni
   * jsou take zobrazene jako prvni
   * @param mode - mod strankovani
   */
  public function AddPagerMode($mode)
  {
    global $wph;
    $mode->ParentPager = $this;
    //xml_set_element_handler($pars, array(&$this, 'startElement') , array(&$this, 'endElement'));  
    $mode->TargetedPage = $this->targetedPage;
    $mode->PageCount = $this->pageCount;
    array_push($this->_modes, $mode);
    $this->BasicPaging = 0;
  }
  
  /**
   * Odstrani vsechny jiz pridane mody strankovani
   */
  public function ClearPagerModes()
  {
    $this->_modes = array();
    $this->BasicPaging = 0;
  }
}

/**
 * Abstraktni trida pro vsechny dalsi vypisy stranek do pageru. 
 */
abstract class PagerMode
{
  //vypsani jednoho linku
  public $ParentPager;
  public $TargetedPage;
  public $PageCount;
  
  public function Link($page, $anchoringText, $cssClass)
  {
    return $this->ParentPager->prepareLink($page, $anchoringText, $cssClass);
  }
  
  
  /**
   * Tato metoda bude vypisovat pred aktualni stranku
   */
  public abstract function WriteFirstPart();
  
  /**
   * Tato metoda bude vypisovat za aktualni stranku
   */
  public abstract function WriteSecondPart();
}

/**
 * Nejjednodussi strankovani - vypise odkazy na uplne vsechny stranky
 * napr. 1 2 3 4 5 6
 */
class DefaultPagerMode extends PagerMode
{
  /** css trida odkazu */
  public $LinkCssClass;
  /**
   * Vypise odkazy na stranky pred aktualni strankou
   */
  public function WriteFirstPart()
  {
    for ($i = 1; $i < $this->TargetedPage; $i++)
      echo $this->Link($i, $i, $this->LinkCssClass);
  }
  
  /**
   * Vypise odkazy na stranky za aktualni strankou
   */
  public function WriteSecondPart()
  {
    for ($i = $this->TargetedPage + 1; $i <= $this->PageCount; $i++)
      echo $this->Link($i, $i, $this->LinkCssClass);
  }
}

/**
 * Vypise odkazy na predchozi a dalsi stranku
 * napr. < 3 >
 */
class PrevNextPagerMode extends PagerMode
{
  /** text odkazu na predchozi stranku */
  public $PrevPageText = "&lt;";
  /** text odkazu na nasledujici stranku */
  public $NextPageText = "&gt;";
  /** css trida odkazu na predchozi stranku */
  public $PrevCssClass;
  /** css trida odkazu na nasledujici stranku */
  public $NextCssClass;
  
  /**
   * Vypise odkaz na predchozi stranku
   */
  public function WriteFirstPart()
  {
    if ($this->TargetedPage > 1)
      echo $this->Link($this->TargetedPage - 1, $this->PrevPageText, $this->PrevCssClass);
    else
      echo $this->PrevPageText. " ";
  }
  
  /**
   * Vypise odkaz na dalsi stranku
   */
  public function WriteSecondPart()
  {
    if ($this->TargetedPage < $this->PageCount)
      echo $this->Link($this->TargetedPage + 1, $this->NextPageText, $this->NextCssClass);
    else
      echo $this->NextPageText. " ";
  }
}

/**
 * Vypise odkazy na prvni a posledni stranku
 * napr. << 3 >>
 */
class FirstLastPagerMode extends PagerMode
{
  /** text odkazu na prvni stranku */
  public $FirstPageText = "&lt;&lt;";
  /** text odkazu na posledni stranku */
  public $LastPageText = "&gt;&gt;";
  /** css trida odkazu na prvni stranku */
  public $FirstCssClass;
  /** css trida odkazu na prvni posledni stranku */
  public $LastCssClass;

  /**
   * Vypise odkaz na prvni stranku
   */
  public function WriteFirstPart()
  {
    echo $this->Link(1, $this->FirstPageText, $this->FirstCssClass);
  }
  
  /**
   * Vypise odkaz na posledni stranku
   */
  public function WriteSecondPart()
  {
    echo $this->Link($this->PageCount, $this->LastPageText, $this->LastCssClass);
  }
}

/**
 * Vypisuje odkazy na nekolik sousednich stranek
 * napr. ...4 5 6...
 */
class NeighbourPagerMode extends PagerMode
{
  /** pocet zobrazenych odkazu na sousedni stranky (na obe strany) */
  public $NeighbourPagesCount = 2;
  /** oddelovac tohoto pageru - vypise se vzdy */
  public $Separator = "&nbsp;";
  /** 
   * oddelovac tohoto pageru, ktery se vypise pouze kdyz 
   * vypsani sousednich stranek nepokrylo vsechny stranky 
   * vhodny je napr. text "..."
   */
  public $MorePagesSeparator = "...";
  /** css trida odkazu */
  public $LinkCssClass;
  
  /**
   * Vypise odkazy na nekolik stranek pred aktualni strankou
   */
  public function WriteFirstPart()
  {
    echo $this->Separator." ";
    if (max(1, $this->TargetedPage - $this->NeighbourPagesCount) != 1)
      echo $this->MorePagesSeparator." ";
    for ($i = max(1, $this->TargetedPage - $this->NeighbourPagesCount); 
         $i < $this->TargetedPage; 
         $i++ )
      echo $this->Link($i, $i, $this->LinkCssClass);
  }
  
  /**
   * Vypise odkazy na nekolik stranek za aktualni strankou
   */
  public function WriteSecondPart()
  {
    for ($i = $this->TargetedPage + 1; 
         $i <= min($this->TargetedPage  + $this->NeighbourPagesCount, $this->PageCount); 
         $i++ )
      echo $this->Link($i, $i, $this->LinkCssClass);
      
    if (min($this->TargetedPage + $this->NeighbourPagesCount, $this->PageCount) != $this->PageCount)
      echo $this->MorePagesSeparator." ";
    echo $this->Separator." ";

  }
}

/**
 * Vypisuje odkazy na nekolik stranek na zacatku a na konci
 * napr. 1 2 ..... 5 6
 */
class BeginEndPagerMode extends PagerMode
{
  /** pocet zobrazenych odkazu na sousedni stranky (na obe strany) */
  public $BeginEndPagesCount = 2;
  /** css trida odkazu */
  public $LinkCssClass;
  /** 
   * Sirka okoli aktualni stranky, ktere je modem ignorovano - vhodne nastavit
   * proti kolizim s neighbour pager modem  
   */
  public $ProtectedDistance = 2;
  /**
   * Vypise odkazy na nekolik prvnich stranek 
   */
  public function WriteFirstPart()
  {
    for ($i = 1; 
         $i < $this->TargetedPage - $this->ProtectedDistance && $i <= $this->BeginEndPagesCount; 
         $i++ )
      echo $this->Link($i, $i, $this->LinkCssClass);
  }
  
  /**
   * Vypise odkazy na nekolik poslednich
   */
  public function WriteSecondPart()
  {
    for ($i = max($this->TargetedPage + $this->ProtectedDistance + 1, $this->PageCount - $this->BeginEndPagesCount + 1);
         $i > $this->TargetedPage && $i <= $this->PageCount; 
         $i++ )
      echo $this->Link($i, $i, $this->LinkCssClass);
    
  }
}

/**
 * Vypise odkazy na vzdalenejsi stranky 
 * (napr. na stranku o deset stranek dopredu a deset stranek zpet)
 * napr. -10 +10
 */
class SkipperPagerMode extends PagerMode
{
  /** text odkazu zpet */
  public $BackSkipText = "&lt;-2";
  /** text odkazu vpred */
  public $ForwardSkipText = "+2&gt";
  /** delka skoku vpred a zpet - pocet stranek */ 
  public $SkipLength = 2;
  /** css trida odkazu zpet*/
  public $BackSkipCssClass;
  /** css trida odkazu vpred */
  public $ForwardSkipCssClass;

  /**
   * Vypise odkaz na stranku o SkipLength stranek zpet
   */
  public function WriteFirstPart()
  {
    if ($this->TargetedPage > $this->SkipLength)
      echo $this->Link($this->TargetedPage - $this->SkipLength, $this->BackSkipText, $this->BackSkipCssClass);
  }
  
  /**
   * Vypise odkaz na stranku o SkipLength stranek vpred
   */
  public function WriteSecondPart()
  {
    if ($this->PageCount >= $this->TargetedPage + $this->SkipLength)
      echo $this->Link($this->TargetedPage + $this->SkipLength, $this->ForwardSkipText, $this->ForwardSkipCssClass);;
  }
}


/**
 * Ridky mod - pise odkazy na kazdou n-tou stranku
 * (s moznosti nastavit velikost okoli aktualni stranky, do ktereho
 * nebude tento mod odkazovat - uvnitr tohoto okoli doporucuji pouzit
 * NeighbourPagerMode)
 * napr. 1 5 10 15 20
 */
class SparsePagerMode extends PagerMode
{
  /** Interval mezi strankami */
  public $SkipLength = 5;
  /** 
   * Sirka okoli aktualni stranky, ktere je modem ignorovano - vhodne nastavit
   * proti kolizim s neighbour pager modem  
   */
  public $ProtectedDistance = 2;
  /** css trida odkazu */
  public $LinkCssClass;
  /**
   * Vypise odkazy na stranky pred aktualni strankou
   */
  public function WriteFirstPart()
  {
    $res = array();
    for ($i = $this->TargetedPage; 
      $i > 0;
      $i -= $this->SkipLength)
    {
      if ($i >= $this->TargetedPage - $this->ProtectedDistance)
        continue;  
      array_push($res, $i);
    }
    
    foreach (array_reverse($res) as $i)
      echo $this->Link($i, $i, $this->LinkCssClass);
  }
  
  /**
   * Vypise odkazy na stranky za aktualni strankou
   */
  public function WriteSecondPart()
  {
    for ($i = $this->TargetedPage; 
        $i < $this->PageCount;
        $i += $this->SkipLength)
    {
      if ($i <= $this->TargetedPage + $this->ProtectedDistance)
        continue;  
      echo $this->Link($i, $i, $this->LinkCssClass);
    }
  }
}

?>
