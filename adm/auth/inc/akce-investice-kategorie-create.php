<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
 $test21 = $_POST['category-name'];
 $test22 = $test21;
 $test22 = preg_replace('~[^\\pL0-9_]+~u', '-', $test22);
 $test22 = trim($test22, "-");
 $test22 = iconv("utf-8", "us-ascii//TRANSLIT", $test22);
 $test22 = strtolower($test22);
 $test22 = preg_replace('~[^-a-z0-9_]+~', '', $test22); 
?>
<?php
  // zde je include souboru s konstantami
 require_once "config/config.inc.php";
 
$o_name = $test22;
$o_nazev = $_POST['category-name'];

$vysledek_vlozeni = mysql_query("INSERT into categories (`name`, `nazev`) values ('$o_name', '$o_nazev')");
if (!$vysledek_vlozeni)
die('Nepodařilo se vložit nový řádek.'. mysql_error());

$path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=investice-kategorie-seznam";
        Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);
?> 