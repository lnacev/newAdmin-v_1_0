<?php 
require_once "config/config.inc.php";
//
function preved($s)
 {
  $s = preg_replace('~[^\\pL0-9_]+~u', '-', $s);
  $s = trim($s, "-");
  $s = strtolower($s);    
    static $tbl = array("\xc3\xa1"=>"a","\xc3\xa4"=>"a","\xc4\x8d"=>"c","\xc4\x8f"=>"d","\xc3\xa9"=>"e","\xc4\x9b"=>"e","\xc3\xad"=>"i","\xc4\xbe"=>"l","\xc4\xba"=>"l","\xc5\x88"=>"n","\xc3\xb3"=>"o","\xc3\xb6"=>"o","\xc5\x91"=>"o","\xc3\xb4"=>"o","\xc5\x99"=>"r","\xc5\x95"=>"r","\xc5\xa1"=>"s","\xc5\xa5"=>"t","\xc3\xba"=>"u","\xc5\xaf"=>"u","\xc3\xbc"=>"u","\xc5\xb1"=>"u","\xc3\xbd"=>"y","\xc5\xbe"=>"z","\xc3\x81"=>"A","\xc3\x84"=>"A","\xc4\x8c"=>"C","\xc4\x8e"=>"D","\xc3\x89"=>"E","\xc4\x9a"=>"E","\xc3\x8d"=>"I","\xc4\xbd"=>"L","\xc4\xb9"=>"L","\xc5\x87"=>"N","\xc3\x93"=>"O","\xc3\x96"=>"O","\xc5\x90"=>"O","\xc3\x94"=>"O","\xc5\x98"=>"R","\xc5\x94"=>"R","\xc5\xa0"=>"S","\xc5\xa4"=>"T","\xc3\x9a"=>"U","\xc5\xae"=>"U","\xc3\x9c"=>"U","\xc5\xb0"=>"U","\xc3\x9d"=>"Y","\xc5\xbd"=>"Z");
    return strtr($s, $tbl);
 }
 $test2 = preved($_POST['category-name']);
 //
$kat = $_POST['category-name'];
$date = date('Y-m-d', str_replace('.','-',strtotime($_POST['date'])));
//
if(isset($_POST)) {
//
$qry2 = "INSERT INTO gallery_categories (`slug`, `category_name`, `date`) values (\"".$test2."\",\"".$kat."\",\"".$date."\")";
		$ret2=mysql_query($qry2);
        
if (!$ret2)
die('Nepodařilo se vložit nový řádek.'. mysql_error());

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/dev/balonparty/adm/auth/index.php?page=galerie-kategorie-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path); 
}        
?>