              <h1 class="edit-list-title">Název nové stránky <span>(vytvoření obsahu)</span></h1>
              
              <div class="edit-list-wrap">

                  <form id="contact-form" class="edit-list-form" action="./inc/akce-pages-create.php" method="post">

                                  <fieldset>
                                      <label for="page-name">Název stránky:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="page-name" name="page-name" title="Název stránky"/>
                                      <span class="edit-list-tooltip" title="Název stránky.">?</span>
                                  </fieldset>
                                  <!--<fieldset>
                                      <label for="page-title1">Nadpis stránky:</label>
                                      <input class="text-input" type="text" value="" id="page-title1" name="page-title1" title="Nadpis stránky"/>
                                      <span class="edit-list-tooltip" title="Nadpis stránky vystihující její obsah.">?</span>
                                  </fieldset>-->

                      <div class="text-editor-wrap">
                          <span class="text-editor-title">Obsah stránky</span>
                          <div class="text-editor"><textarea id="ckeditor" name="tiny"></textarea></div>
                          <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
                                      </script>
                      </div>                         

                                  <fieldset>
                                      <label for="page-title2">Titulek stránky:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="page-title2" name="page-title2" title="Titulek stránky"/>
                                      <span class="edit-list-tooltip" title="Titulek stránky slouží k její identifikaci a vypisuje se jako její název v prohlížeči.">?</span>
                                  
                                      <label for="page-meta">META popisek:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="page-meta" name="page-meta" title="META popisek"/>
                                      <span class="edit-list-tooltip" title="Popis stránky důležitý pro vyhledávače. V krátké větě použijte klíčová slova.">?</span>
                                  </fieldset>

                                  <fieldset>
                                      <label for="page-keywords">Klíčová slova:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="page-keywords" name="page-keywords" title="Klíčová slova"/>
                                      <span class="edit-list-tooltip" title="Zde uveďte klíčová slova související s obsahem stránky. Oddělujte je čárkou.">?</span>

                                      <label for="page-url">URL adresa:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="page-url" name="page-url" title="URL adresa" />
                                      <span class="edit-list-tooltip" title="URL adresa stránky se vytváří automaticky. Následné upravy by měl provádět pouze zkušený uživatel.">?</span>
                                  </fieldset>

                                  <p>
                                      <input type="submit" value="Vytvořit stránku" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte novou stránku." />
                                      <!--<input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>-->
                                      <a href="index.php?page=editace_obsahu-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
