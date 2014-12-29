<?php 
//$datum = date("j-n-Y"); 
//$datum = date("Y-m-j");
?>
              <h1 class="edit-list-title">Editace investice <span>(úprava investic)</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="./inc/akce-investice-edit.php" method="post">
<?php
require_once "./inc/config/config.inc.php";
$id = $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
//$vysledek=mysql_query("SELECT `id`, `id_novinky`, DATE_FORMAT(datum,'%e-%c-%Y') as `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek` FROM news WHERE id='$id'");
$vysledek=mysql_query("SELECT `investice`.`nazev-novinky` AS productname,
                              `categories`.`name` AS katname,
                              `categories`.`nazev` AS katnazev,
                              `categories`.`id` AS katid,
                              `investice`.`id_novinky`,
                              `datum`, 
                              `url-stranky`, 
                              `investice`.`id`, 
                              `kratky-popis`, 
                              `clanek`, 
                              `soubor` 
                              FROM `investice` 
LEFT JOIN `investice_kat` ON `investice`.`id`=`investice_kat`.`clanky`
LEFT JOIN `categories` ON `investice_kat`.`kategorie`=`categories`.`id` 
WHERE `investice`.`id`='$id' LIMIT 1") or die (mysql_error());
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo "<input name=\"id\" type=\"hidden\" value='".$zaznam['id']."'/>
                                <fieldset>
                                      <label for=\"page-name\">Název investice:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam['productname']}\" id=\"page-name\" name=\"page-name\" title=\"Název investice\"/>
                                      <span class=\"edit-list-tooltip\" title=\"Název investice.\">?</span>
                                      <label for=\"page-name\">Kategorie:</label>
                                      <select size=\"1\" name=\"categories\" class=\"selection\">
                                      <option value=\"{$zaznam['katid']}\">{$zaznam['katnazev']}</option>
                                      <option value=\"\">-- Vyberte kategorii --</option>";
                                      $urlx2=mysql_query("SELECT * FROM `categories`");
                                      while ($dotazx2=MySQL_Fetch_Array($urlx2))
                                {echo "<option value=\"{$dotazx2['id']}\">{$dotazx2['nazev']}</option>";}
                                 echo "</select>\n
                                 <span class=\"edit-list-tooltip\" title=\"Výběr kategorie.\">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for=\"date\">Datum vytvoření:</label>
                                      <input class=\"text-input\" type=\"text\" value=\"{$zaznam['datum']}\" id=\"date\" name=\"date\" title=\"Titulek stránky\" />
                                      <span class=\"edit-list-tooltip\" title=\"Datum, kdy byla investice vytvořena.\">?</span>
                                  
                                  </fieldset>
                                   
                                  <div class=\"news-annotation-wrap\">
                                      <span class=\"news-annotation-title\">Krátký popis (anotace investice, která by měla stručně vystihnout její obsah):</span>
                                      <textarea id=\"annotation\" onKeyUp=\"pocitani()\" name=\"annotation\" rows=\"4\" />{$zaznam['kratky-popis']}</textarea>
                                      <div id=\"annotation-count-remainder\"><span class=\"pokus\">Pro text anotace zbývá znaků:</span><input id=\"zbyva\" readonly value=\"200\" ></div><div id=\"annotation-count-write\"><span class=\"pokus\">Napsaných znaků:</span><input id=\"napsano\" readonly  size=\"2\" value=\"0\"></div>";
                                      if($_GET['page']=="novinky-edit"){include_once "script/maxcount.js";}else{echo "";} 
                                echo "</div>

                                  <div class=\"text-editor-wrap\">
                                      <span class=\"text-editor-title\">Obsah investice</span> 
                                      <div class=\"text-editor\"><textarea id=\"tiny\" name=\"tiny\">{$zaznam['clanek']}</textarea></div>
                                  </div>";
  endwhile; ?>
                                  

                                  <p>
                                      <!--<input type="submit" value="Uložit a pokračovat" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a můžete pokračovat v editaci"/>-->
                                      <input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>
                                      <a href="index.php?page=novinky-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
