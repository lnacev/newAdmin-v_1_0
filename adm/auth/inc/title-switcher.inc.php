<?php //Vložení podmínky pro výpis meta z db(1 vl. záznam)
require_once "db_conn.php"; // Spojení na databázi
if(isset($_GET['read'])){
  $id_stranky=$_GET['read'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
  $Vyber=mysql_query("SELECT * FROM `clanky` WHERE `id_stranky`='$id_stranky'  LIMIT 1") or die (mysql_error());
    $Vypis=mysql_fetch_array($Vyber); // Naplníme pole
      if($Vypis['nazev']){  // Dostali jsme nějaký výsledek, vypíšeme článek
echo "<meta name=\"keywords\" content=\"".$Vypis['keywords']."\" />
      <meta name=\"description\" content=\"".$Vypis['description']."\" />
      <title>".$Vypis['title']."</title>\n";}
}else{
echo "<meta name=\"keywords\" content=\"montáže plotů, montáže teras, montáž\" />
      <meta name=\"description\" content=\"montáže plotů, montáže teras, montáž\" />
      <title>Montáže plotů a teras - namontujeme Vám kvalitní plot i terasu</title>\n";} ?>