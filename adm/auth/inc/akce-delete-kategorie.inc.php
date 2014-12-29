<?php
  // zde je include souboru s konstantami
  require_once "config/config.inc.php";

$o_id = $_POST['id'];
//$o_url = $_POST['www'];
//$o_name = $_POST['name'];

$vysledek_vlozeni = mysql_query("DELETE FROM `categories` WHERE `id` = '$o_id'");
if (!$vysledek_vlozeni)
die('Nepodařilo se smazat soubor.'. mysql_error());

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=investice-kategorie-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);  
?> 