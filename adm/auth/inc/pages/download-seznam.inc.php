              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Download</h1>
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
    ->from('download')//
    ->orderBy('id DESC');

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
                                      <th class=\"name\">Název souboru</th>
                                      <th class=\"cat\">Kategorie</th>
                                      <th class=\"date\">Datum</th>
																			<th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n"; 
  echo "<td class=\"name\">".$radek['name']."</td>\n"; // 
  echo "<td class=\"cat\">".$radek['kategories']."</td>\n"; // 
  echo "<td class=\"date\">".$radek['datum']."</td>\n"; // 
  echo "<td class=\"action\"><a title=\"Smazat soubor\" href=\"index.php?page=download-del&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat soubor\" src=\"imgs/delete-icon.gif\"></a></td>\n"; //
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Přidání nového souboru" href="index.php?page=download-novy-soubor" class="btn-red-white">Přidání nového souboru</a>
                  </div>

              <div class="clear"></div> 