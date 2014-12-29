              <h1 class="edit-list-title">Název upravované stránky <span>(editace obsahu)</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="./inc/akce-pages-edit.php" method="post">
                                  <?php
require_once "./inc/config/config.inc.php";
$id= $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
$vysledek=mysql_query("SELECT * FROM clanky WHERE id='$id'");
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo "<fieldset>
                                      <input name=\"id\" type=\"hidden\" value='".$zaznam['id']."'/>
                                      <label for=\"page-name\">Název stránky:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"".$zaznam['nazev']."\" id=\"page-name\" name=\"page-name\" title=\"Název stránky\"/>
																			<span class=\"edit-list-tooltip\" title=\"Název stránky.\">?</span>
                                  </fieldset>

                      <div class=\"text-editor-wrap\">
                          <span class=\"text-editor-title\">Obsah stránky</span>
                          <div class=\"text-editor\"><textarea id=\"ckeditor\" name=\"tiny\">".$zaznam['clanek']."</textarea></div>
                      </div>
                      <script>
                // Replace the <textarea id=\"editor1\"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
                                      </script>
                                  <fieldset>
                                      <label for=\"page-title2\">Titulek stránky:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"".$zaznam['title']."\" id=\"page-title2\" name=\"page-title2\" title=\"Titulek stránky\"/>
                                      <span class=\"edit-list-tooltip\" title=\"Titulek stránky slouží k její identifikaci a vypisuje se jako její název v prohlížeči.\">?</span>
                                  
                                      <label for=\"page-meta\">META popisek:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"".$zaznam['description']."\" id=\"page-meta\" name=\"page-meta\" title=\"META popisek\"/>
                                      <span class=\"edit-list-tooltip\" title=\"Popis stránky důležitý pro vyhledávače. V krátké větě použijte klíčová slova.\">?</span>
                                  </fieldset>

                                  <fieldset>
                                      <label for=\"page-keywords\">Klíčová slova:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"".$zaznam['keywords']."\" id=\"page-keywords\" name=\"page-keywords\" title=\"Klíčová slova\"/>
                                      <span class=\"edit-list-tooltip\" title=\"Zde uveďte klíčová slova související s obsahem stránky. Oddělujte je čárkou.\">?</span>

                                      <label for=\"page-url\">URL adresa:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"".$zaznam['www']."\" id=\"page-url\" name=\"page-url\" title=\"URL adresa\" />
                                      <span class=\"edit-list-tooltip\" title=\"URL adresa stránky se vytváří automaticky. Následné upravy by měl provádět pouze zkušený uživatel.\">?</span>
                                  </fieldset>";
  endwhile; ?>

                                  <p>
                                      <!--<input type="submit" value="Uložit a pokračovat" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a můžete pokračovat v editaci"/>-->
                                      <input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>
                                      <a href="#" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 