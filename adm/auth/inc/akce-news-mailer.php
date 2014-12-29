<?php
//error_reporting(E_ALL); ini_set('display_errors', 'on'); // *** Ladící režim ***
require_once "config/config.inc.php";
require_once "config/cs-mail-function.php";
?>
<?php
if (isset($_POST['ok-sub'])) {
if (!empty($_POST['page-name']) and ($_POST['annotation']) and ($_POST['date']))    
{ 
    	$vypis = "<h5>E-mail byl odeslán na tyto adresy:</h5>";
      $dotaz = "SELECT * FROM mailer ";
	    $vysledky = mysql_query ( $dotaz) or die (mysql_error());


	while ($radek = mysql_fetch_array($vysledky)){
	extract($radek);

  cs_mail ($mail, $predmet, $zprava, "From: Mailer@obecsrch.cz\n");
  //$vypis .= "<p>$mail</p>\n";
  
} 
}
}if (empty($_POST['page-name']) and ($_POST['annotation']) and ($_POST['date'])) {
	//$vypis = "<p>E-mail se nepodařilo odeslat. </p>";
	}
$path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=mail-seznam";
Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);	
?>