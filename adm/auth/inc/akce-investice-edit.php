<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
 $test = $_POST['page-name'];
 $test2 = $test;
 $test2 = preg_replace('~[^\\pL0-9_]+~u', '-', $test2);
 $test2 = trim($test2, "-");
 $test2 = iconv("utf-8", "us-ascii//TRANSLIT", $test2);
 $test2 = strtolower($test2);
 $test2 = preg_replace('~[^-a-z0-9_]+~', '', $test2);

  // zde je include souboru s konstantami
  require_once "config/config.inc.php";

$o_id = $_POST['id'];
$o_id_novinky = $test2;
$o_url_stranky = $test2;
$datum = $_POST['date'];
//$datum2 = $datum;
//$datum2 = strtotime($datum2);
//$datum2 = date("Y-m-j", $datum2);
//$o_datum = $datum2;
$o_datum = $datum;
$o_nazev_novinky = $_POST['page-name'];
$o_kratky_popis =  $_POST['annotation'];
$o_clanek = $_POST['tiny'];
$o_kategorie = $_POST['categories'];

/* $vysledek_vlozeni = mysql_query("UPDATE `investice` SET `id_novinky` = '$o_id_novinky', `datum` = '$o_datum', `nazev-novinky` = '$o_nazev_novinky', `url-stranky` = '$o_url_stranky', `kratky-popis` = '$o_kratky_popis', `clanek` = '$o_clanek' WHERE `id` = '$o_id'");
if (!$vysledek_vlozeni)
die('Nepodařilo se vložit nový řádek.'. mysql_error()); */

$qry = "UPDATE `investice`, `investice_kat` SET `id_novinky` = '$o_id_novinky', `datum` = '$o_datum', `nazev-novinky` = '$o_nazev_novinky', `url-stranky` = '$o_url_stranky', `kratky-popis` = '$o_kratky_popis', `clanek` = '$o_clanek', `investice_kat`.`kategorie` WHERE `investice`.`id` ='$o_id' AND `investice_kat`.`id` = '$o_id'" ; 
$ret=mysql_query($qry);

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=investice-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);  
?> 