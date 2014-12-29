<?php
  // zde je include souboru s konstantami
  require_once "config/config.inc.php";

$o_id = $_POST['id'];
$o_archiv = $_POST['categories'];
//$o_date = $_POST['date'];
$o_date = $_POST['date2'];

$qry = "UPDATE `download` SET `archive` = '$o_archiv', `datum2` = '$o_date' WHERE `download`.`id` ='$o_id'" ; 
$ret=mysql_query($qry);

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=uredni-deska";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);  
?>