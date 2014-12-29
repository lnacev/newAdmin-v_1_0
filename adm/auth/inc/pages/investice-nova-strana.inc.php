<?php 
//$datum = date("j-n-Y"); 
$datum = date("Y-m-d");
?>
              <h1 class="edit-list-title">Přidání nové investice <span>(vytvoření investice)</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" enctype="multipart/form-data" action="./inc/akce-investice-create.php" method="post">

                                  <fieldset>
                                      <label for="page-name">Název investice:</label>
                                      <input class="text-input" type="text" value="" id="page-name" name="page-name" title="Název investice"/>
                                      <span class="edit-list-tooltip" title="Nadpis právě vytvářené investice.">?</span>
                                      <label for="categories">Výběr kategorie:</label>
                                      <select class="selection" name="categories" size="1">
                                      <option value="">-- Vyberte kategorii --</option> 
                                      <?php require_once "inc/config/config.inc.php"; 
  $url=mysql_query("SELECT * FROM `categories`");
while ($dotaz=MySQL_Fetch_Array($url)) 
{         echo "<option value='".$dotaz['id']."'>".$dotaz['nazev']."</option>"; }    
 ?>
                                      </select>
                                      <span class="edit-list-tooltip" title="Vyberte kategorii, ke které bude investice patřit.">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for="datum">Datum zveřejnění:</label>
                                      <input class="text-input" type="text" value="<?php echo $datum; ?>" id="date" name="date" title="Titulek investice" />
                                      <span class="edit-list-tooltip" title="Datum, kdy byla investice vytvořena.">?</span>
                                      <label for="datum">Příloha:</label>
                                      <input class="text-input" name="uploaded" type="file" />
                                      <span class="edit-list-tooltip" title="Jméno vybraného souboru jako příloha.">?</span>
                                  </fieldset>
                               
                                  
                                  <div class="news-annotation-wrap">
                                      <span class="news-annotation-title">Krátký popis (anotace investice, která by měla stručně vystihnout její obsah):</span>
                                      <textarea id="annotation" onKeyUp="pocitani()" name="annotation" rows="4" /></textarea>
                                      <div id="annotation-count-remainder"><span class="pokus">Pro text anotace zbývá znaků:</span><input id="zbyva" readonly value="200" ></div><div id="annotation-count-write"><span class="pokus">Napsaných znaků:</span><input id="napsano" readonly  size="2" value="0"></div>
                                      <?php if($_GET['page']=="novinky-nova-strana"){include_once "script/maxcount.js";}else{echo "";} ?>
                                  </div>

                                  <div class="text-editor-wrap">
                                      <span class="text-editor-title">Obsah investice</span> 
                                      <div class="text-editor"><textarea id="ckeditor" name="tiny"></textarea></div>
                                      <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
                                      </script>
                                  </div>                         

                                  <p>
                                      <input type="submit" name="upload" value="Vytvořit investici" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte novou investici"/>
                                      <!--<input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>-->
                                      <a href="index.php?page=investice-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
