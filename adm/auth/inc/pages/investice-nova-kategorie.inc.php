              <h1 class="edit-list-title">Vytvoření nové kategoie pro sekci Investice <?php //if(isset($GET['stat'])){if($GET['stat']=="pass"){echo "(Nová kategorie přidána...)";}}else{echo "";}?></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="./inc/akce-investice-kategorie-create.php" method="post">

                                  <fieldset>
                                      <label for="category-name">Název kategorie:</label>
                                      <input class="text-input" type="text" value="" id="category-name" name="category-name" title="Název kategorie"/>
                                      <span class="edit-list-tooltip" title="Název nové investice.">?</span>
                                  </fieldset>

                                  <p>
                                      <input type="submit" value="Vytvořit kategorii" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte novou kategorii"/>
                                      <a href="index.php?page=novinky-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div>