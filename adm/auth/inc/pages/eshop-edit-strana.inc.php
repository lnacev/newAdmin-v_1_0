<?php 
//echo md5("pwdodblokuj10"); 
$datum = date("Y-m-j");
?>
              <h1 class="edit-list-title">Úprava produktu <span>(upravení produktu)</span></h1>
              
              <div class="edit-list-wrap">

                  <?php
$o_idx = $_GET['id'];
//require_once "inc/db_conn.php";
//require_once('inc/dbplibc.php');
try {
$whx2 = '`products2`.`id`="'.$o_idx.'"';
//$whx = '';
//
$db = new db_connection(SQL_HOST,SQL_USERNAME,SQL_PASSWORD,SQL_DBNAME);
// priprava dotazu *********************
$dotaz = $db->select('*') //
    ->from('products2')//
//    ->joinOn('product_kat', '`products`.`id`=`product_kat`.`produkty`', 'LEFT') //
//    ->joinOn('kategories', '`product_kat`.`kategorie`=`kategories`.`id`') //
//    ->orderBy('products.id DESC') //
    ->where($whx2); 

// priprava strankovani
$limit = 1;
$pager = new pager($limit);
$pager->count = $dotaz->match(true); // spocitani celkoveho poctu polozek

// pridat limit do dotazu
$dotaz->limit($pager->offset(), $limit);

// vypis polozek
$vysledek = $dotaz->exec();
while($radek = $vysledek->row()) {                          
                     echo '
                                <form class="edit-list-form" enctype="multipart/form-data" action="./inc/akce-eshop-edit.php" method="post">
                                  <fieldset>
                                      <input class="text-input" type="hidden" value="'.$radek['id'].'" id="id" name="id" />
																			<label for="page-name">Název produktu:</label>
                                      <input class="text-input" type="text" value="'.$radek['nazev'].'" id="page-name" name="page-name" title="Název stránky"/>
                                      <span class="edit-list-tooltip" title="Nadpis právě vytvářené novinky.">?</span>
                                      <label for="categories">Výběr kategorie:</label>
                                      <select class="selection" name="categories" size="1">  
																			<option value="">-- Výber kategorii / nevybráním ponecháte stávající --</option>
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
                                      <span id="show-me">Změnit foto/přílohu</span>
																			<div id="company-hide-form" class="form-left">
                                      <label for="datum">Foto produktu:</label>
                                      <input class="text-input" name="uploaded" type="file" />
                                      <span class="edit-list-tooltip" title="Jméno vybraného souboru jako příloha.">?</span>
                                      <label for="datum">Příloha:</label>
                                      <input class="text-input" name="uploaded2" type="file" />
                                      <span class="edit-list-tooltip" title="Jméno vybraného souboru jako příloha.">?</span>
                                      <label for="datum">Příloha 2:</label>
                                      <input class="text-input" name="uploaded3" type="file" />
                                      <span class="edit-list-tooltip" title="Jméno vybraného souboru jako příloha.">?</span>
                                      </div>
                                  </fieldset>
                                  <fieldset>
                                      <label for="vlastnost">Typ oslavy:</label>
                                      <select class="selection" name="vlastnost" size="1"> 
                                      <option value="';
																			if($radek['vlastnost']=="svatba"){echo"Svatba";}elseif($radek['vlastnost']=="narozeniny"){echo'Narozeniny';}elseif($radek['vlastnost']=="rozlucka-se-svobodou"){echo'Rozlučka se svobodou';}elseif($radek['vlastnost']=="halloween"){echo'Halloween';}elseif($radek['vlastnost']=="vanoce"){echo'Vánoce';}elseif($radek['vlastnost']=="silvestr"){echo'Silvestr';}elseif($radek['vlastnost']=="karneval"){echo'Karneval';}elseif($radek['vlastnost']=="valentyn"){echo'Valentýn';}elseif($radek['vlastnost']=="detske-motivy"){echo'Dětské motivy';}elseif($radek['vlastnost']=="narozeni-ditete"){echo'Narození dítěte';}echo'">';
                                      if($radek['vlastnost']=="svatba"){echo"Svatba";}elseif($radek['vlastnost']=="narozeniny"){echo'Narozeniny';}elseif($radek['vlastnost']=="rozlucka-se-svobodou"){echo'Rozlučka se svobodou';}elseif($radek['vlastnost']=="halloween"){echo'Halloween';}elseif($radek['vlastnost']=="vanoce"){echo'Vánoce';}elseif($radek['vlastnost']=="silvestr"){echo'Silvestr';}elseif($radek['vlastnost']=="karneval"){echo'Karneval';}elseif($radek['vlastnost']=="valentyn"){echo'Valentýn';}elseif($radek['vlastnost']=="detske-motivy"){echo'Dětské motivy';}elseif($radek['vlastnost']=="narozeni-ditete"){echo'Narození dítěte';}
																			echo'</option> 
																			<option value="">-- Výber dodání --</option>
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
                                      <input class="text-input" type="text" value="'.$radek['velikost'].'" id="velikost" name="velikost" title="Napište velikost daného produktu (cm)" />
                                      <span class="edit-list-tooltip" title="Napište velikost daného produktu (cm).">?</span>
                                      <label for="datum">Cena (Kč):</label>
                                      <input class="text-input" type="text" value="'.$radek['cena'].'" id="cena" name="cena" title="Cena produktu" />
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
                                      <option value="'.$radek['skladem'].'">';
																			if($radek['skladem']==1){echo"Skladem";}else{echo"Na objednávku do 14 dnů";}
																			echo '</option> 
																			<option value="">-- Výber dodání --</option>
																			<option value="1">Skladem</option>
                                      <option value="0">Na objednávku do 14 dnů</option>
                                      </select>
                                      <span class="edit-list-tooltip" title="Vyberte čas dodání.">?</span>
                                  </fieldset>                         
                                   <div class="clear"></div>

                                  <div class="text-editor-wrap">
                                      <span class="text-editor-title">Popis produktu</span> 
                                      <div class="text-editor"><textarea id="ckeditor" name="tiny">'.$radek['text'].'</textarea></div>
                                      <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( "ckeditor" );
                                      </script>
                                  </div>

                                  <!--<fieldset>
                                      <label for="page-keywords">Obrázek novinky:</label>
                                      <input class="text-input" type="file" value="" id="page-keywords" name="page-keywords" title="Klíčová slova"/>
                                      <span class="edit-list-tooltip" title="Klíčová slova nápověda">?</span>
                                  </fieldset>-->

                                  <p>
                                      <input type="submit" name="upload" value="Upravit produkt" class="btn-red-grey" title="Kliknutím upravíte produkt"/>
                                      <!--<input type="submit" value="Uložit změny" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny a ukončíte editaci"/>-->
                                      <a href="index.php?page=eshop-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>'; 
 }
}

catch(Exception $e) {
 echo $e->getMessage();
 if(isset($e->debug_info)) echo ', info: '.$e->debug_info;
}
?>
                  
              </div>

              <div class="clear"></div> 
                      
                       