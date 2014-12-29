<?php //Vložení podmínky pro výpis meta z db(1 vl. záznam)
require_once "db_conn.php"; // Spojení na databázi
if(isset($_GET['read'])){
  $id_stranky=$_GET['read'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
  $Vyber=mysql_query("SELECT * FROM `clanky` WHERE `id_stranky`='$id_stranky'  LIMIT 1") or die (mysql_error());
    $Vypis=mysql_fetch_array($Vyber); // Naplníme pole
      if($Vypis['nazev']){  // Dostali jsme nějaký výsledek, vypíšeme článek
        echo "
<meta name=\"keywords\" content=\"".$Vypis['keywords']."\" />
<meta name=\"description\" content=\"".$Vypis['description']."\" />
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
<title>".$Vypis['title']."</title>";
      }
}else{
        echo "
<meta name=\"keywords\" content=\"hlavní strana\" />
<meta name=\"description\" content=\"hlavní strana\" />
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
<title>Test CMS title</title>";
      }
//Konec vložení podmínky pro výpis meta z db
?>