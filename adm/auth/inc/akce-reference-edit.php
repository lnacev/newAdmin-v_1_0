<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
/*
 $test = $_POST['page-name'];
 $test2 = $test;
 $test2 = preg_replace('~[^\\pL0-9_]+~u', '-', $test2);
 $test2 = trim($test2, "-");
 $test2 = iconv("utf-8", "us-ascii//TRANSLIT", $test2);
 $test2 = strtolower($test2);
 $test2 = preg_replace('~[^-a-z0-9_]+~', '', $test2);
*/
function preved($s)
 {
  $s = preg_replace('~[^\\pL0-9_]+~u', '-', $s);
  $s = trim($s, "-");
  $s = strtolower($s);    
    static $tbl = array("\xc3\xa1"=>"a","\xc3\xa4"=>"a","\xc4\x8d"=>"c","\xc4\x8f"=>"d","\xc3\xa9"=>"e","\xc4\x9b"=>"e","\xc3\xad"=>"i","\xc4\xbe"=>"l","\xc4\xba"=>"l","\xc5\x88"=>"n","\xc3\xb3"=>"o","\xc3\xb6"=>"o","\xc5\x91"=>"o","\xc3\xb4"=>"o","\xc5\x99"=>"r","\xc5\x95"=>"r","\xc5\xa1"=>"s","\xc5\xa5"=>"t","\xc3\xba"=>"u","\xc5\xaf"=>"u","\xc3\xbc"=>"u","\xc5\xb1"=>"u","\xc3\xbd"=>"y","\xc5\xbe"=>"z","\xc3\x81"=>"A","\xc3\x84"=>"A","\xc4\x8c"=>"C","\xc4\x8e"=>"D","\xc3\x89"=>"E","\xc4\x9a"=>"E","\xc3\x8d"=>"I","\xc4\xbd"=>"L","\xc4\xb9"=>"L","\xc5\x87"=>"N","\xc3\x93"=>"O","\xc3\x96"=>"O","\xc5\x90"=>"O","\xc3\x94"=>"O","\xc5\x98"=>"R","\xc5\x94"=>"R","\xc5\xa0"=>"S","\xc5\xa4"=>"T","\xc3\x9a"=>"U","\xc5\xae"=>"U","\xc3\x9c"=>"U","\xc5\xb0"=>"U","\xc3\x9d"=>"Y","\xc5\xbd"=>"Z");
    return strtr($s, $tbl);
 }
$test2 = preved($_POST['page-name']); 
?>
<?php
  // zde je include souboru s konstantami
 require_once "config/config.inc.php";

$o_id = $_POST['id'];
$o_mesto = $_POST['mesto'];
$o_name = $_POST['nazev'];
$o_nazev = $_POST['page-name'];
$o_clanek = $_POST['tiny'];
//
$qry = "UPDATE `reference` SET `nazev` = '$o_nazev', `text` = '$o_clanek', `jmeno` = '$o_name', `mesto` = '$o_mesto' WHERE `reference`.`id` ='$o_id'" ; 
$ret=mysql_query($qry);

if (!$ret)
die('Nepodařilo se vložit nový řádek.'. mysql_error());
/* ** */
$path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/dev/balonparty/adm/auth/index.php?page=editace_obsahu-reference";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);
?>         