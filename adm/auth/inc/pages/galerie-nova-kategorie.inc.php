              <h1 class="edit-list-title">Vytvoření nové Galerie</h1>
              
              <div class="edit-list-wrap">

                  <form id="contact-form" class="edit-list-form" action="./inc/gallery-insert.php" method="post">

                                  <fieldset>
                                      <label for="category-name">Název Galerie:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="category-name" name="category-name" title="Název kategorie"/>
                                      <span class="edit-list-tooltip" title="Galerie , do kterých patří jednotlivé obrázky.">?</span>
                                      <!--<label for="date">Datum konání akce / galerie:</label>
                                      <div class="clear"></div>
                                      <input type="text" title="Datum akce" name="date" id="date" value="" class="text-input">-->
                                  </fieldset>


                                  <p>
                                      <input type="submit" value="Vytvořit galerii" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte novou galerii"/>
                                      <a href="index.php?page=galerie-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
