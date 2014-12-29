              <h1 class="edit-list-title">Upravení galerie</h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="./inc/gallery-update.php" method="post">

                                  <fieldset>
<?php
require_once "./inc/config/config.inc.php";
$id= $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
$vysledek=mysql_query("SELECT `id`, `slug`, `category_name`, DATE_FORMAT(date,'%d.%m.%Y') as `datum` FROM gallery_categories WHERE id='$id'");
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo '<input type="hidden" class="text-input" value="'.$zaznam['id'].'" name="id" />
																<label for="category-name">Název galerie:</label>
																<input class="text-input" type="text" value="'.$zaznam['category_name'].'" id="category-name" name="category-name" title="Název Galerie"/>
																<span class="edit-list-tooltip" title="Galerie, do kterých patří jednotlivé obrázky.">?</span>
																<label for="date">Datum konání akce / galerie:</label>
                                <div class="clear"></div>
                                <!--<input type="text" title="Datum akce" name="date" id="date" value="'.$zaznam['datum'].'" class="text-input">-->';
endwhile; ?>
                                      
                                  </fieldset>


                                  <p>
                                      <input type="submit" value="Upravit galerii" class="btn-red-grey" onclick="" title="Kliknutím upravíte galerii"/>
                                      <a href="index.php?page=galerie-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
