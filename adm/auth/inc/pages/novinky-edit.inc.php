<?php 
//$datum = date("j-n-Y"); 
//$datum = date("Y-m-j");
?>
              <h1 class="edit-list-title">Editace novinky <span>(úprava novinek)</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" enctype="multipart/form-data" action="./inc/akce-news-edit.php" method="post">
<?php
require_once "./inc/config/config.inc.php";
$id= $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
//$vysledek=mysql_query("SELECT `id`, `id_novinky`, DATE_FORMAT(datum,'%e-%c-%Y') as `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek` FROM news WHERE id='$id'");
$vysledek=mysql_query("SELECT `id`, DATE_FORMAT(datum,'%d.%m.%Y') as `datum`, `nazev-novinky`, `url-stranky`, `clanek` FROM `news` WHERE id='$id'");
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo "<input name=\"id\" type=\"hidden\" value='".$zaznam['id']."'/>
                                <fieldset>
                                      <label for=\"page-name\">Název novinky:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam['nazev-novinky']}\" id=\"page-name\" name=\"page-name\" title=\"Název stránky\"/>
                                      <span class=\"edit-list-tooltip\" title=\"Název novinky.\">?</span>
                                      <span id=\"show-me\">Změnit foto/přílohu</span>
																			<div id=\"company-hide-form\" class=\"form-left\">
                                      <label for=\"uploaded\">Příloha:</label>
                                      <input class=\"text-input\" type=\"file\" name=\"uploaded\" />
                                      <span class=\"edit-list-tooltip\" title=\"Název foto/přílohy.\">?</span>
                                      </div>
																</fieldset>
																
                                <fieldset>
                                      <label for=\"date\">Datum vytvoření:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam['datum']}\" id=\"date\" name=\"date\" title=\"Titulek stránky\" />
                                  
                                </fieldset>
                                  <div class=\"text-editor-wrap\">
                                      <span class=\"text-editor-title\">Obsah novinky</span> 
                                      <div class=\"text-editor\"><textarea id=\"ckeditor\" name=\"tiny\">{$zaznam['clanek']}</textarea></div>
                                  </div>                         
                                  <script>
                // Replace the <textarea id=\"editor1\"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
                                      </script>";
  endwhile; ?>
                                  

                                  <p>
                                      <!--<input type="submit" value="Uložit a pokračovat" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a můžete pokračovat v editaci"/>-->
                                      <input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci" name="upload"/>
                                      <a href="index.php?page=novinky-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
