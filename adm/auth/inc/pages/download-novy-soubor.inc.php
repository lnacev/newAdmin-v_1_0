<h1 class="edit-list-title">Přidání nového souboru</h1>
              
              <div class="edit-list-wrap">

      <form class="edit-list-form" enctype="multipart/form-data" action="./../../../upload.php" method="POST">

                                  <fieldset>
                                      <label for="uploaded">Vyberte soubor</label>
                                      <input class="text-input" name="uploaded" type="file" /><br>
                                      <br />
                                      <!--<span class="edit-list-tooltip" title="Název stránky nápověda">?</span>-->
                                      <label for="category-name">Výběr kategorie:</label>
                                      <select class="selection" name="category-name" size="1"> 
                                      <option value="archiv">Archív</option>
                                      <option value="investice">Investice</option>
                                      <option value="zpravodaj">Zpravodaj</option>
                                      <option value="titanic">Titanic</option>
                                      <option value="sokol">Sokol</option>
                                      <option value="sportovni-klub">Sportovní klub</option>
                                      <option value="vyhlasky">Vyhlášky</option>
                                      <option value="rozpocet">Rozpočet</option>
                                      <option value="zapisy-jednani">Zápisy z jednání</option>
                                      <option value="uredni-deska">Úřední deska</option>
                                      <option value="registr">Registr oznámení</option>
                                      </select>
                                  </fieldset>
                                  <fieldset>
                                  <label for="datum">Datum zveřejnění:</label>
                                      <input class="text-input" type="text" value="<?php echo date("Y-m-d"); ?>" id="date" name="date" title="Datum" />
                                      <span class="edit-list-tooltip" title="Datum">?</span>
                                  </fieldset>



                                  <p>
                                      <input type="submit" name="upload" value="Upload" class="btn-red-grey" onclick="" title="Kliknutím nahrajete vybraný soubor"/>
                                      <a href="index.php?page=download-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div>

