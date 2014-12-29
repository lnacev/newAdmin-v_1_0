<?php
//require_once "config/config.inc.php";
$o_idx = $_GET['id'];
//$o_url = $_POST['www'];
//$o_name = $_POST['name'];

$vysledek_vlozeni2 = mysql_query("DELETE FROM `kosik` WHERE `id` = '$o_idx'");
if (!$vysledek_vlozeni2)
die('Nepodařilo se smazat řádek.'. mysql_error());
//
?>
              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Faktury</h1>
                      <!--<ul class="table-list-tabs">
                            <li class="selected"><a title="Zveřejněné" href="#">Zveřejněné</a></li>
                            <li><a title="Nezveřejněné" href="#">Nezveřejněné</a></li>
                      </ul>-->
                  </div>
                       
                       
                       
                       
                       <?php
//require_once "inc/db_conn.php";
//require_once('inc/dbplibc.php');

$db = new db_connection(SQL_HOST,SQL_USERNAME,SQL_PASSWORD,SQL_DBNAME);
// priprava dotazu
// priprava dotazu
$dotaz = $db->select('*') //
    ->from('kosik')//
//    ->joinOn('product_kat', '`products`.`id`=`product_kat`.`produkty`', 'LEFT') //
//    ->joinOn('kategories', '`product_kat`.`kategorie`=`kategories`.`id`') //
    ->orderBy('id DESC');
;
// priprava strankovani
$limit = 10;
$pager = new pager($limit);
$pager->count = $dotaz->match(true); // spocitani celkoveho poctu polozek

// pridat limit do dotazu
$dotaz->limit($pager->offset(), $limit);

// vypis polozek
$vysledek = $dotaz->exec();
                          
                     echo "<table class=\"list-products\">
                                  <tr>
                                      <th class=\"ean\">Id</th>
                                      <th class=\"name\">Jméno a příjmení</th>
                                      <th class=\"manufacturer\">Datum</th>
                                      <th class=\"price\">Číslo faktury</th>
                                      <th class=\"action2\">Akce</th>  
                                  </tr>";
$m = 0; // pomocná proměnná, můžeme ji zároveň použít pro číslování řádků   
//postupne ziskavani jednotlivych zaznamu z vysledkove sady
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"".(++$m % 2 ? "tr-grey" : "suda")."\">\n";  // tady se za pomoci modula a ternárního operátoru vypíše vhodná třída
  echo "<td class=\"ean\">".$radek['id']."</td>\n"; // zde je $m využita jako číslo řádku
  echo "<td class=\"name\">".$radek['jmeno']."&nbsp;".$radek['prijmeni']."</td>\n"; // zde je $m využita jako číslo řádku 
  echo "<td class=\"manufacturer\">".$radek['datum']."</td>\n"; // zde je $m využita jako číslo řádku
  echo "<td class=\"price\">".$radek['faktura']."</td>\n"; // zde je $m využita jako číslo řádku 
  echo "<td class=\"action3\"><a href=\"index.php?page=fakturace&id=".$radek['id']."\" title=\"Otevřít\"><img width=\"25\" height=\"25\" src=\"imgs/add-icon.gif\" alt=\"otevřít fakturu\" /></a> <a href=\"index.php?page=eshop-edit-strana&amp;id=20\" title=\"Upravit produkt\"><img width=\"25\" height=\"25\" src=\"imgs/edit-icon.gif\" alt=\"Upravit novinku\"></a> <a class=\"red\" href=\"index.php?page=fakturace-hlavni&id=".$radek['id']."\" title=\"Smazat\" onclick=\"javascript: return confirm('Opravdu chcete zaznam smazat ?')\"><img width=\"25\" height=\"25\" src=\"imgs/delete-icon.gif\" alt=\"Smazat fakturu\" /></a></td>\n"; // zde je $m využita jako číslo řádku
  echo "</tr>\n"; 
} 
echo "</table>\n"; ?>
<br /><br />&nbsp;&nbsp;
<?php echo $pager->pages(); ?>
                       
                       
                       
                       
                       
                         
                                   
                              <a title="Vytvoření nové faktury" href="index.php?page=eshop-nova-strana" class="btn-red-white">Nová faktura</a>
                  </div>

              <div class="clear"></div> 