<?php
//require_once "config/config.inc.php";
$o_idx = $_GET['id'];
//$o_url = $_POST['www'];
//$o_name = $_POST['name'];

$vysledek_vlozeni2 = mysql_query("DELETE FROM `products2` WHERE `id` = '$o_idx'");
if (!$vysledek_vlozeni2)
die('Nepodařilo se smazat řádek.'. mysql_error());
// 
?>
              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Produkty</h1>
                      <!--<ul class="table-list-tabs">
                            <li class="selected"><a title="Zveřejněné" href="#">Zveřejněné</a></li>
                            <li><a title="Nezveřejněné" href="#">Nezveřejněné</a></li>
                      </ul>-->
                  </div>
                  <?php
//require_once "inc/db_conn.php";
//require_once('inc/dbplibc.php');
try {
$whx2 = '';
//$whx = '';
//
$db = new db_connection(SQL_HOST,SQL_USERNAME,SQL_PASSWORD,SQL_DBNAME);
// priprava dotazu *********************
$dotaz = $db->select('*') //
    ->from('products2')//
    ->orderBy('id DESC') //
    ->where($whx2); 

// priprava strankovani
$limit = 10;
$pager = new pager($limit);
$pager->count = $dotaz->match(true); // spocitani celkoveho poctu polozek

// pridat limit do dotazu
$dotaz->limit($pager->offset(), $limit);

// vypis polozek
$vysledek = $dotaz->exec();
                          
                     echo "<table id=\"news-table\">
                                  <tbody><tr>
                                      <th class=\"date\">Id</th>
                                      <th class=\"name\">Název produktu</th>
                                      <th class=\"annotation\">Cena za produkt</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"date\">".$radek['id']."</td>\n"; // 
  echo "<td class=\"name\">".$radek['nazev']."</td>\n"; // 
  echo "<td class=\"annotation\">".$radek['cena']." Kč</td>\n"; // 
  echo "<td class=\"action\"><a title=\"Upravit produkt\" href=\"index.php?page=eshop-edit-strana&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit novinku\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat produkt\" onclick=\"return confirm('Chcete opravdu smazat tento soubor?')\" href=\"index.php?page=eshop-seznam&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat novinku\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); 

}

catch(Exception $e) {
 echo $e->getMessage();
 if(isset($e->debug_info)) echo ', info: '.$e->debug_info;
}
?>       
                                   
                              <a title="Vytvoření nového produktu" href="index.php?page=eshop-nova-strana" class="btn-red-white">Nový produkt</a>
                  </div>

              <div class="clear"></div> 