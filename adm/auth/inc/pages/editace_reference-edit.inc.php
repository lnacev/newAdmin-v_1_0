              <h1 class="edit-list-title">Název nové stránky <span>(vytvoření obsahu)</span></h1>
              
              <div class="edit-list-wrap">

                  <form id="contact-form" class="edit-list-form" action="./inc/akce-reference-edit.php" method="post">

<?php
require_once "./inc/config/config.inc.php";
$id= $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
//$vysledek=mysql_query("SELECT `id`, `id_novinky`, DATE_FORMAT(datum,'%e-%c-%Y') as `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek` FROM news WHERE id='$id'");
$vysledek=mysql_query("SELECT * FROM `reference` WHERE id='$id'");
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo '<input name="id" type="hidden" value='.$zaznam['id'].'/>
																<fieldset>
                                      <label for="page-name">Název reference:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="'.$zaznam['nazev'].'" id="page-name" name="page-name" title="Název stránky"/>
                                      <span class="edit-list-tooltip" title="Název stránky.">?</span>
                                  </fieldset>

                      <div class="text-editor-wrap">
                          <span class="text-editor-title">Obsah stránky</span>
                          <div class="text-editor"><textarea id="ckeditor" name="tiny">'.$zaznam['text'].'</textarea></div>
                          <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( "ckeditor" );
                                      </script>
                      </div>                         

                                  <fieldset>
                                      <label for="page-title2">Jméno a příjmení:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="'.$zaznam['jmeno'].'" id="page-title2" name="nazev" title="Jméno a příjmení"/>
                                      <span class="edit-list-tooltip" title="Titulek stránky slouží k její identifikaci a vypisuje se jako její název v prohlížeči.">?</span>
                                  </fieldset>

                                  <fieldset>
                                      <label for="page-keywords">Město:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="'.$zaznam['mesto'].'" id="page-keywords" name="mesto" title="Město"/>
                                      <span class="edit-list-tooltip" title="Zde uveďte klíčová slova související s obsahem stránky. Oddělujte je čárkou.">?</span>
                                  </fieldset>';
endwhile; ?>

                                  <p>
                                      <input type="submit" value="Vytvořit referenci" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte novou referenci." />
                                      <!--<input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>-->
                                      <a href="index.php?page=editace_obsahu-reference" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
