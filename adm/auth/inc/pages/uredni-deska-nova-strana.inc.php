<h1 class="edit-list-title">Přidání nového souboru (Úřední deska)</h1>
              
              <div class="edit-list-wrap">

      <form class="edit-list-form" enctype="multipart/form-data" action="./../../../upload-deska.php" method="POST">

                                  <fieldset>
                                      <label for="uploaded">Vyberte soubor</label>
                                      <input class="text-input" name="uploaded" type="file" /><br>
                                      <br />
                                      <!--<span class="edit-list-tooltip" title="Název stránky nápověda">?</span>-->
                                      <label for="category-name">Výběr kategorie:</label>
                                      <select class="selection" name="category-name" size="1"> 
                                      <option value="uredni-deska">Úřední deska</option>
                                      </select>
                                  </fieldset>
                                  
                       



                                  <p>
                                      <input type="submit" name="upload" value="Upload" class="btn-red-grey" onclick="" title="Kliknutím nahrajete vybraný soubor"/>
                                      <a href="index.php?page=uredni-deska" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div>

