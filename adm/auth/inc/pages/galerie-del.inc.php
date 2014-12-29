              <h1 class="edit-list-title">Smazání stránky</h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="./inc/akce-delete-obsah.inc.php" method="post">
                                  <?php
require_once "./inc/config/config.inc.php";
$id= $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
$vysledek=mysql_query("SELECT * FROM clanky WHERE id='$id'");
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo "<fieldset>
                                      <input name=\"id\" type=\"hidden\" value='".$zaznam['id']."'/>
                                      <label for=\"page-name\">Název stránky:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"".$zaznam['nazev']."\" id=\"page-name\" name=\"page-name\" title=\"Název stránky\"/>
                                  </fieldset>
                                  <fieldset>
                                      <label for=\"page-title1\">Nadpis stránky:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"".$zaznam['name']."\" id=\"page-title1\" name=\"page-title1\" title=\"Nadpis stránky\"/>
                                      <span class=\"edit-list-tooltip\" title=\"Nadpis stránky nápověda\">?</span>
                                  </fieldset>";
  endwhile; ?>

                                  <p>
                                      <input type="submit" value="Uložit a pokračovat" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a můžete pokračovat v editaci"/>
                                      <input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>
                                      <a href="#" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 