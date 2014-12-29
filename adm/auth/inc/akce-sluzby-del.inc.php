<?php
  // zde je include souboru s konstantami
  require_once "config/config.inc.php";

$o_id = $_POST['id'];

$vysledek_vlozeni = mysql_query("DELETE FROM `sluzby` WHERE `id` = '$o_id'");
if (!$vysledek_vlozeni)
die('Nepodařilo se vložit nový řádek.'. mysql_error());

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=sluzby-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);  
?> 