<?php 
//$datum = date("j-n-Y"); 
//$datum = date("Y-m-j");
?>
              <h1 class="edit-list-title">Archivace dokumentů <span>(Úřední deska)</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="./inc/akce-deska-edit.inc.php" method="post">
<?php
require_once "./inc/config/config.inc.php";
$id = $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
//$vysledek=mysql_query("SELECT `id`, `id_novinky`, DATE_FORMAT(datum,'%e-%c-%Y') as `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek` FROM news WHERE id='$id'");
$vysledek=mysql_query("SELECT * 
                              FROM `download`  
WHERE `id`='$id' LIMIT 1") or die (mysql_error());
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo "<input name=\"id\" type=\"hidden\" value='".$zaznam['id']."'/>
                                <fieldset>
                                      <label for=\"page-name\">Název dokumentu:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam['name']}\" id=\"page-name\" name=\"page-name\" title=\"Název dokumentu\"/>
                                      <span class=\"edit-list-tooltip\" title=\"Název dokumentu.\">?</span>
                                      <label for=\"page-name\">Archivace:</label>
                                      <select size=\"1\" name=\"categories\" class=\"selection\">
                                      <option value=\"{$zaznam['archive']}\">";
                                      if($zaznam['archive']==1){echo "Aktivní";}else{echo "Sejmuto";} 
                                      echo "</option>
                                      <option value=\"\">-- Vyberte typ akce --</option>
                                      <option value=\"1\">Aktivní</option>
                                      <option value=\"2\">Sejmuto</option>
                                      </select>\n
                                 <span class=\"edit-list-tooltip\" title=\"Archivace.\">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for=\"date\">Datum vytvoření:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam['datum']}\" id=\"date\" name=\"date\" title=\"Titulek stránky\" disabled=\"disabled\" />
                                      <span class=\"edit-list-tooltip\" title=\"Datum, kdy byl dokument vytvořen ve formátu: rok-měsíc-den (2011-08-26).\">?</span>
                                      <label for=\"date2\">Datum sejmutí - archivace:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam['datum2']}\" id=\"date2\" name=\"date2\" title=\"Titulek stránky\" />
                                      <span class=\"edit-list-tooltip\" title=\"Datum, kdy byl dokument sejmut - archivován ve formátu: rok-měsíc-den (2011-08-26).\">?</span>
                                  
                                  </fieldset>";
  endwhile; ?>
                                  

                                  <p>
                                      <!--<input type="submit" value="Uložit a pokračovat" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a můžete pokračovat v editaci"/>-->
                                      <input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>
                                      <a href="index.php?page=novinky-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div>                           
