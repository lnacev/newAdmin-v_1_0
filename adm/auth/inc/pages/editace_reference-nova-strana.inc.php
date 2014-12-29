              <h1 class="edit-list-title">Název nové reference <span>(od zákazníků)</span></h1>
              
              <div class="edit-list-wrap">

                  <form id="contact-form" class="edit-list-form" action="./inc/akce-reference-create.php" method="post">

                                  <fieldset>
                                      <label for="page-name">Název reference:</label>
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
                                      <label for="page-title2">Jméno a příjmení:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="page-title2" name="nazev" title="Jméno a příjmení"/>
                                      <span class="edit-list-tooltip" title="Titulek stránky slouží k její identifikaci a vypisuje se jako její název v prohlížeči.">?</span>                                      
                                  </fieldset>

                                  <fieldset>
                                      <label for="page-keywords">Město:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="page-keywords" name="mesto" title="Město"/>
                                      <span class="edit-list-tooltip" title="Zde uveďte klíčová slova související s obsahem stránky. Oddělujte je čárkou.">?</span>
                                  </fieldset>

                                  <p>
                                      <input type="submit" value="Vytvořit referenci" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte novou referenci." />
                                      <!--<input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>-->
                                      <a href="index.php?page=editace_obsahu-reference" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
