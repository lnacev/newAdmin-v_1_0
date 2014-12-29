<?php
//include, DB connect, ...
//require_once "inc/config/config.inc.php";
require __DIR__ . '/../tools/tracy.php';
require_once "inc/class/dibi.min.php";
require_once "inc/config/dibi_con.php"; 
require_once "inc/class/TreeMptt.class.php";
//------------------------------------------------------------------------------
//instance:
use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT, __DIR__ . "/../log");
//
$Tree = new TreeMptt('category_tree', 'category_item', array('name', 'url_name', 'logo'));
//
?>
              <h1 class="edit-list-title">Vytvoření nové kategoie</h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="editace_page.html" method="post">

                                  <fieldset>
                                      <label for="category-name">Název kategorie:</label>
                                      <input class="text-input" type="text" value="" id="category-name" name="category-name" title="Název kategorie"/>
                                      <span class="edit-list-tooltip" title="Kategorie webu, do kterých patří jednotlivé stránky.">?</span>
                                      <label for="categories">Hierarchie (sub-kategorie):</label>
                                      <?php /*$result = dibi::query('SELECT * FROM category_item LIMIT 1,10000');
                                            foreach ($result as $n => $row) {
                                            echo "<option value=\"{$row['id']}\">{$row['name']}</option>"; }
                                            unset($result); */
                                      //vypis:
$subTree = $Tree->getSubTree();
$out = '<select size="1" name="categories" class="selection">';
foreach ($subTree as $val) {
	$out.='<option class="lvl' . $val['lvl'] . '" value="' . $val['id'] . '">'; if($val['lvl']==2){$out.=" - ";} 
	$out.=$val['name'] . '</option>';
}
$out.='</select>';
echo $out;
//------------------------------------------------------------------------------      
																			?>                                      
                                  </fieldset>


                                  <p>
                                      <input type="submit" value="Vytvořit kategorii" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte novou kategorii"/>
                                      <a href="index.php?page=editace_obsahu-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
