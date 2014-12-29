<?php // Vložení podmínky pro výpis článků z db(2 vl. záznam)  ************************************************
if(isset($_GET['read'])){
  $id_stranky=$_GET['read'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
//require_once "adm/auth/inc/db_conn.php"; // Spojení na databázi
  $Vyber=mysql_query("SELECT * FROM `clanky` WHERE `id_stranky`='$id_stranky' LIMIT 1") or die (mysql_error());
    $Vypis=mysql_fetch_array($Vyber); // Naplníme pole
      if($Vypis['nazev']){  // Dostali jsme nějaký výsledek, vypíšeme článek
        echo $Vypis['clanek'];
        //if($_GET['read']=="traplast" or $_GET['read']=="everwood" or $_GET['read']=="balardo"){echo "<div id=\"gallery\">";}
        //if($_GET['read']=="traplast" or $_GET['read']=="everwood" or $_GET['read']=="balardo"){include_once "gal-view.php";} 
       // if($_GET['read']=="traplast" or $_GET['read']=="everwood" or $_GET['read']=="balardo"){echo "</div>";}
      }//else{
       // echo "Stránka s tímto názvem se v databázi nenachází.";
      //}
}elseif (isset($_GET['page'])){        // pokud byl odeslán ?page= ...
  $soubor=$_GET['page'];
  $soubor2= dirname($_SERVER['SCRIPT_FILENAME'])."/inc/pages/".$soubor.".inc.php";  // připsání mezi-koncovky "ink" + uložení v adresáři inc/pages
  $soubor3=strtolower($soubor);
  if(file_exists($soubor2)){      //pokud soubor existuje, načteme ho do středu
     if(substr_count($soubor,"../")>0){ // pokud je v parametru alespoň 1x ../ neumožíme soubor načíst
       echo "<h3>Upozornění</h3>Nelze nahrát soubor v nadřazeném adresáři!";
     }elseif($soubor3=="index" or $soubor3=="/index" or $soubor3=="./index"){ // index načíst nepovolíme, vznikl by nekonečný cyklus - retezec jsem pred tim prevedl na male pismena
       echo "<h3>Upozornění</h3>Index nemůže načíst sám sebe!";
     }else{
       include $soubor2;
     }
  }else{                //pokud soubor neexistuje, zavoláme error404.php
     include "error404.php";
  }
}else{                  // Pokud nebyl paramentr page nebo read volaný, načteme uvod.php
  include "inc/pages/main.inc.php";
} ?>