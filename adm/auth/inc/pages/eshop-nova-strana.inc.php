<?php 
//echo md5("pwdodblokuj10"); 
$datum = date("j.m.Y");
?>
              <h1 class="edit-list-title">Přidání nového produktu <span>(vytvoření produktu)</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" enctype="multipart/form-data" action="./inc/akce-eshop-create.php" method="post">

                                  
                                  <fieldset>
                                      <label for="page-name">Název produktu:</label>
                                      <input class="text-input" type="text" value="" id="page-name" name="page-name" title="Název stránky"/>
                                      <span class="edit-list-tooltip" title="Nadpis právě vytvářené novinky.">?</span>
                                      <label for="categories">Výběr kategorie:</label>
                                      <select class="selection" name="categories" size="1"> 
                                      <option value="">-- Výběr kategorie --</option>
                                      <option value="Latexové balónky - jednobarevné">Latexové balónky - jednobarevné</option>
                                      <option value="Latexové balónky - s potiskem">Latexové balónky - s potiskem</option>
                                      <option value="Latexové balónky - tvarované">Latexové balónky - tvarované</option>
                                      <option value="Latexové balónky - modelovací balónky">Latexové balónky - modelovací balónky</option>
                                      <option value="Latexové balónky - obří balóny">Latexové balónky - obří balóny</option>
                                      <option value="Foliové balónky - jednobarevné">Foliové balónky - jednobarevné</option>
                                      <option value="Foliové balónky - s potiskem">Foliové balónky - s potiskem</option>
                                      <option value="Doplňky k balónkům">Doplňky k balónkům</option>
                                      <option value="Dekorační látky - Tyl">Dekorační látky - Tyl</option>
                                      <option value="Dekorační látky - Organza">Dekorační látky - Organza</option>
                                      <option value="Stuhy">Stuhy</option>
                                      <option value="Konfety">Konfety</option>
                                      <option value="Vystřelovací konfety">Vystřelovací konfety</option>
                                      <option value="Party doplňky">Party doplňky</option>
                                      </select>
                                      <span class="edit-list-tooltip" title="Vyberte kategorii, ke které bude novinka patřit.">?</span>
                                      <label for="datum">Foto produktu:</label>
                                      <input class="text-input" name="uploaded" type="file" />
                                      <span class="edit-list-tooltip" title="Jméno vybraného souboru jako příloha.">?</span>
                                      <label for="datum">Příloha:</label>
                                      <input class="text-input" name="uploaded2" type="file" />
                                      <span class="edit-list-tooltip" title="Jméno vybraného souboru jako příloha.">?</span>
                                      <label for="datum">Příloha 2:</label>
                                      <input class="text-input" name="uploaded3" type="file" />
                                      <span class="edit-list-tooltip" title="Jméno vybraného souboru jako příloha.">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for="vlastnost">Typ oslavy:</label>
                                      <select class="selection" name="vlastnost" size="1"> 
                                      <option value="">-- Výběr typu oslavy --</option>
																			<option value="Svatba">Svatba</option>
                                      <option value="Narozeniny">Narozeniny</option>
                                      <option value="Rozlučka se svobodou">Rozlučka se svobodou</option>
                                      <option value="Halloween">Halloween</option>
                                      <option value="Vánoce">Vánoce</option>
                                      <option value="Silvestr">Silvestr</option>
                                      <option value="Karneval">Karneval</option>
                                      <option value="Valentýn">Valentýn</option>
                                      <option value="Dětské motivy">Dětské motivy</option>
                                      <option value="Narození dítěte">Narození dítěte</option>
                                      </select>
                                      <span class="edit-list-tooltip" title="Napište vlastnost produktu.">?</span>
																			<label for="velikost">Velikost (cm):</label>
                                      <input class="text-input" type="text" value="" id="velikost" name="velikost" title="Napište velikost daného produktu (cm)" />
                                      <span class="edit-list-tooltip" title="Napište velikost daného produktu (cm).">?</span>
                                      <label for="datum">Cena (Kč):</label>
                                      <input class="text-input" type="text" value="" id="cena" name="cena" title="Cena produktu" />
                                      <span class="edit-list-tooltip" title="Napište cenu daného produktu.">?</span>
																			<label for="dodani">Doporučené zboží:</label>
                                      <select class="selection" name="doporucujeme" size="1">
                                      <option value="0">Ne</option>
                                      <option value="0">-- Vyberte možnost --</option>
																			<option value="1">Ano</option>
                                      <option value="0">Ne</option>
                                      </select>
                                      <span class="edit-list-tooltip" title="Vyberte čas dodání.">?</span>
																			<label for="dodani">Čas dodání:</label>
                                      <select class="selection" name="dodani" size="1">
                                      <option value="1">Skladem</option>
                                      <option value="0">Na objednávku do 14 dnů</option>
                                      </select>
                                      <span class="edit-list-tooltip" title="Vyberte čas dodání.">?</span>
                                  </fieldset>                         
                                   <div class="clear"></div>

                                  <div class="text-editor-wrap">
                                      <span class="text-editor-title">Popis produktu</span> 
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
                                      <input type="submit" name="upload" value="Vytvořit produkt" class="btn-red-grey" onclick="return confirm('Přidat produkt?')" title="Kliknutím vytvoříte nový produkt"/>
                                      <!--<input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>-->
                                      <a href="index.php?page=eshop-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
