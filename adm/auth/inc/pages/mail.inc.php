<?php 
//$datum = date("j-n-Y"); 
//$datum = date("Y-m-j");
?>
              <h1 class="edit-list-title">Mailer <span>(odeslání novinky e-mailem)</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" enctype="multipart/form-data" action="./inc/akce-news-mailer.php" method="post">
<?php 
require_once "./inc/config/config.inc.php";
$id12= $_POST['categories'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
//$vysledek=mysql_query("SELECT `id`, `id_novinky`, DATE_FORMAT(datum,'%e-%c-%Y') as `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek` FROM news WHERE id='$id'");
$vysledek12=mysql_query("SELECT `datum`, `nazev-novinky`, `clanek` , `soubor` FROM `news` WHERE id='$id12'");
while ($zaznam12=MySQL_Fetch_Array($vysledek12)): 
                                echo "<fieldset>
                                      <input name=\"odeslat\" type=\"hidden\" value='1'/>
                                      <label for=\"page-name\">Název novinky:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam12['nazev-novinky']}\" id=\"page-name\" name=\"page-name\" title=\"Název stránky\"/>
                                      <span class=\"edit-list-tooltip\" title=\"Nadpis právě vytvářené novinky.\">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for=\"datum\">Datum vytvoření:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam12['datum']}\" id=\"date\" name=\"date\" title=\"Titulek stránky\" />
                                      <span class=\"edit-list-tooltip\" title=\"Datum, kdy byla novinka vytvořena.\">?</span>
                                  </fieldset>

                                  <div class=\"text-editor-wrap\">
                                      <span class=\"text-editor-title\">Obsah novinky</span> 
                                      <div class=\"text-editor\"><textarea id=\"annotation\" name=\"annotation\">
                                       ".strip_tags($zaznam12['clanek'])."
                                      </textarea></div>
                                   <fieldset>   
                                  <label for=\"page-file\">Příloha:</label>";
                                      if($zaznam12['soubor']=="none"){echo "<input class=\"text-input\" type=\"text\" value=\"Bez přílohy\" id=\"page-file\" name=\"page-file\" title=\"Příloha\"/>";}else{echo "<input class=\"text-input\" type=\"text\" value=\"{$zaznam12['soubor']}\" id=\"page-file\" name=\"page-file\" title=\"Příloha\"/>";}
                                      echo "<span class=\"edit-list-tooltip\" title=\"Příloha k novince.\">?</span>
                                    </fieldset>  
                                  </div>                         
                                  <p>
                                      <input type=\"submit\" name=\"ok-sub\" value=\"Odeslat novinku\" class=\"btn-red-grey\" onclick=\"\" title=\"Odeslat novinku\"/>
                                  </p>"; 
                                 endwhile; ?>

                  </form>
                  
              </div>

              <div class="clear"></div> 
