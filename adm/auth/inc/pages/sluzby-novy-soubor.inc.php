<h1 class="edit-list-title">Přidání nové firmy</h1>
              
              <div class="edit-list-wrap">

      <form class="edit-list-form" enctype="multipart/form-data" action="./inc/akce-sluzby-create.php" method="POST">

                                  <fieldset>
                                      <label for="uploaded">Vyberte foto</label>
                                      <input class="text-input" name="uploaded" type="file" /><br>
                                      <br />
                                      <!--<span class="edit-list-tooltip" title="Název stránky nápověda">?</span>-->
                                      <label for="category-name">Název firmy:</label>
                                      <input class="text-input" type="text" value="" id="page-name" name="sluzby-firma" title="Název firmy">
                                      
                                      <label for="category-name">Adresa:</label>
                                      <input class="text-input" type="text" value="" id="page-name" name="sluzby-adresa" title="Adresa">
                                      
                                      <label for="category-name">Telefon:</label>
                                      <input class="text-input" type="text" value="" id="page-name" name="sluzby-tel" title="Telefon">
                                      
                                      <label for="category-name">Webové stánky:</label>
                                      <input class="text-input" type="text" value="" id="page-name" name="sluzby-www" title="Webové stánky">
                                      <span class="info">Správné zadání ulr( příklad: http://www.obecsrch.cz/ )</span>
                                      
                                      
                                      <label for="category-name">Krátký popis:</label>
                                      <input class="text-input" type="text" value="" id="page-name" name="sluzby-desc" title="Krátký popis">
                                  </fieldset>
                                  
                       



                                  <p>
                                      <input type="submit" name="upload" value="Přidat" class="btn-red-grey" onclick="" title="Kliknutím nahrajete vybraný soubor"/>
                                      <a href="index.php?page=download-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div>

