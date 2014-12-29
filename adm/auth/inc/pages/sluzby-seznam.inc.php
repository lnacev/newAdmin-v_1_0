              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Služby</h1>
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
$dotaz = $db->select('*') //
    ->from('sluzby')//
    ->orderBy('id');

// priprava strankovani
$limit = 10;
$pager = new pager($limit);
$pager->count = $dotaz->match(true); // spocitani celkoveho poctu polozek

// pridat limit do dotazu
$dotaz->limit($pager->offset(), $limit);

// vypis polozek
$vysledek = $dotaz->exec();
                          
                     echo "<table id=\"download-table\">
                                  <tbody><tr>
                                      <th class=\"name\">Název firmy</th>
                                      <th class=\"cat\">Adresa</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n"; 
  echo "<td class=\"name\">".$radek['nazev']."</td>\n"; // 
  echo "<td class=\"cat\">".$radek['adresa']."</td>\n"; // 
//  echo "<td class=\"action\"><a title=\"Upravit soubor\" href=\"index.php?page=download-edit&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit novinku\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat soubor\" href=\"index.php?page=download-del&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat soubor\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "<td class=\"action\"><a title=\"Upravit službu\" href=\"index.php?page=sluzby-edit&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit investici\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat soubor\" href=\"index.php?page=sluzby-del&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat soubor\" src=\"imgs/delete-icon.gif\"></a></td>\n"; //
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Přidání nové firmy" href="index.php?page=sluzby-novy-soubor" class="btn-red-white">Přidání nové firmy</a>
                  </div>

              <div class="clear"></div> 