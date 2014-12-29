<?php 
//$datum = date("j-n-Y"); 
$datum = date("Y-m-j");
$datumx = date('d.m.Y');
?>
              <h1 class="edit-list-title">Přidání nové novinky <span>(vytvoření novinky)</span></h1>
              
              <div class="edit-list-wrap">

                  <form id="contact-form" class="edit-list-form" enctype="multipart/form-data" action="./inc/akce-news-create.php" method="post">

                                  <fieldset>
                                      <label for="page-name">Název novinky:</label>
                                      <input class="text validate[required,length[0,100]] text-input" type="text" value="" id="page-name" name="page-name" title="Název stránky"/>
                                      <span class="edit-list-tooltip" title="Nadpis právě vytvářené novinky.">?</span>
                                      <label for="datum">Příloha:</label>
                                      <input class="text-input" name="uploaded" type="file" />
                                      <span class="edit-list-tooltip" title="Jméno vybraného souboru jako příloha.">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for="datum">Datum vytvoření:</label>
                                      <input class="text-input" type="text" value="<?php echo $datumx; ?>" id="date" name="date" title="Titulek stránky" />
                                  </fieldset>
                               
                                  
                                  <!--<div class="news-annotation-wrap">
                                      <span class="news-annotation-title">Krátký popis (anotace novinky, která by měla stručně vystihnout její obsah):</span>
                                      <textarea id="annotation" onKeyUp="pocitani()" name="annotation" rows="4" /></textarea>
                                      <div id="annotation-count-remainder"><span class="pokus">Pro text anotace zbývá znaků:</span><input id="zbyva" readonly value="200" ></div><div id="annotation-count-write"><span class="pokus">Napsaných znaků:</span><input id="napsano" readonly  size="2" value="0"></div>
                                      <?php //if($_GET['page']=="novinky-nova-strana"){include_once "script/maxcount.js";}else{echo "";} ?>
                                  </div>-->
                                  <div class="text-editor-wrap">
                                      <span class="text-editor-title">Obsah novinky</span> 
                                      <div class="text-editor"><textarea id="ckeditor" name="tiny"></textarea></div>
																			<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
                                      </script>
                                  </div>                         

                                  <!--<fieldset>
                                      <label for="page-keywords">Obrázek novinky:</label>
                                      <input class="text-input" type="file" value="" id="page-keywords" name="page-keywords" title="Klíčová slova"/>
                                      <span class="edit-list-tooltip" title="Klíčová slova nápověda">?</span>
                                  </fieldset>-->

                                  <p>
                                      <input type="submit" name="upload" value="Vytvořit novinku" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte novou novinku"/>
                                      <!--<input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>-->
                                      <a href="index.php?page=novinky-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
