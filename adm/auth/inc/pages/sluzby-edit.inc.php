<h1 class="edit-list-title">Přidání nového souboru</h1>
              
              <div class="edit-list-wrap">

      <form class="edit-list-form" enctype="multipart/form-data" action="./inc/akce-sluzby-edit.php" method="POST">
<?php
require_once "./inc/config/config.inc.php";
$id= $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
//$vysledek=mysql_query("SELECT `id`, `id_novinky`, DATE_FORMAT(datum,'%e-%c-%Y') as `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek` FROM news WHERE id='$id'");
$vysledek=mysql_query("SELECT * FROM `sluzby` WHERE id='$id'");
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo'<fieldset>
                                      <input class="text-input" type="hidden" value="'.$id.'" id="page-name" name="id" title="Název firmy">
                                      <label for="uploaded">Vyberte foto</label>
                                      <input class="text-input" name="uploaded" type="file" /><br>
                                      <br />
                                      <!--<span class="edit-list-tooltip" title="Název stránky nápověda">?</span>-->
                                      <label for="category-name">Název firmy:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['nazev'].'" id="page-name" name="sluzby-firma" title="Název firmy">
                                      
                                      <label for="category-name">Adresa:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['adresa'].'" id="page-name" name="sluzby-adresa" title="Adresa">
                                      
                                      <label for="category-name">Telefon:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['telefon'].'" id="page-name" name="sluzby-tel" title="Telefon">
                                      
                                      <label for="category-name">Webové stánky:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['web'].'" id="page-name" name="sluzby-www" title="Webové stánky">
                                      
                                      <label for="category-name">Krátký popis:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['popis'].'" id="page-name" name="sluzby-desc" title="Krátký popis">
                                  </fieldset>';
endwhile; ?>
                                  <p>
                                      <input type="submit" name="upload" value="Upload" class="btn-red-grey" onclick="" title="Kliknutím nahrajete vybraný soubor"/>
                                      <a href="index.php?page=download-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div>

