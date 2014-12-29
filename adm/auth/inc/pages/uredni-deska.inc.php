              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Uřední deska</h1>
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
$whx = '`kategories`="uredni-deska"'; 
$dotaz = $db->select('*') //
    ->from('download')//
    ->orderBy('id DESC')
    ->where($whx);

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
                                      <th class=\"date\">Datum vložení</th>
                                      <th class=\"name\">Název dokumentu</th>
                                      <th class=\"annotation\">Archivace</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"date\">".$radek['datum']."</td>\n"; // 
  echo "<td class=\"name\">".$radek['name']."</td>\n"; // 
  echo "<td class=\"annotation\">";
  if($radek['archive']==1){echo "Aktivní";}else{echo "Sejmuto";} // 
  echo "</td>\n";
  echo "<td class=\"action\"><a title=\"Upravit dokument\" href=\"index.php?page=editace_obsahu-uredni-deska&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit dokument\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat dokument\" href=\"index.php?page=uredni-deska-del&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat dokument\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Přidání nového souboru" href="index.php?page=uredni-deska-nova-strana" class="btn-red-white">Nový soubor</a>
                  </div>

              <div class="clear"></div> 