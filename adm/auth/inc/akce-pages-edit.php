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
$o_url_id = $test2;
$o_url = $test2;
$o_nazev = $_POST['page-name'];
$o_name = $_POST['page-title1'];
$o_key = $_POST['page-keywords'];
$o_desc = $_POST['page-meta'];
$o_title = $_POST['page-title2'];
$o_clanek = $_POST['tiny'];

$o_kategories = $_POST['categories'];

/*$qry = "UPDATE INTO `clanky` (`id_stranky`, `keywords`, `description`, `title`, `www`, `name`, `nazev`, `clanek`) values ('$o_url_id', '$o_key', '$o_desc', '$o_title', '$o_url', '$o_name', '$o_nazev', '$o_clanek')";
        $ret=mysql_query($qry);

        $nove_id= mysql_insert_id();

$qry = "UPDATE INTO `menu_kat` (`clanky`, `kategorie`) values (".$nove_id.",".$o_kategories.")";
        $ret=mysql_query($qry); 
$vysledek_vlozeni = mysql_query("UPDATE `news` SET `id_novinky` = '$o_id_novinky', `datum` = '$o_datum', `nazev-novinky` = '$o_nazev_novinky', `url-stranky` = '$o_url_stranky', `kratky-popis` = '$o_kratky_popis', `clanek` = '$o_clanek', `kategorie` = '$o_kategorie' WHERE `id` = '$o_id'");
*/
$qry = "UPDATE `clanky` SET `clanky`.`keywords` = '$o_key', `clanky`.`description` = '$o_desc', `clanky`.`title` = '$o_title', `clanky`.`www` = '$o_url', `clanky`.`nazev` = '$o_nazev', `clanky`.`clanek` = '$o_clanek' WHERE `clanky`.`id` ='$o_id'" ; 
$ret=mysql_query($qry);

if (!$ret)
die('Nepodařilo se vložit nový řádek.'. mysql_error());
/* ** */
$path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/dev/balonparty/adm/auth/index.php?page=editace_obsahu-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);
?>         