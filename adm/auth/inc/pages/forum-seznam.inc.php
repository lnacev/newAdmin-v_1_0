              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Výpis témat</h1>
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
    ->from('investice')//
    ->orderBy('id');

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
                                      <th class=\"name\">Název tématu</th>
                                      <th class=\"date\">Datum a čas</th>
                                      <th class=\"count\">Počet odpovědí</th>
                                      <th class=\"cat\">Kategorie</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"name\">".$radek['nazev-novinky']."</td>\n"; // 
  echo "<td class=\"date\">".$radek['datum']."</td>\n"; //
  echo "<td class=\"date\">".$radek['datum']."</td>\n"; // 
  echo "<td class=\"cat\">".$radek['kratky-popis']."</td>\n"; // 
  echo "<td class=\"action\"><a title=\"Upravit investici\" href=\"index.php?page=investice-edit&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit investici\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat investici\" href=\"index.php?page=investice-del&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat investici\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Vytvoření nové investice" href="index.php?page=investice-nova-strana" class="btn-red-white">Nová investice</a>
                  </div>

              <div class="clear"></div> 