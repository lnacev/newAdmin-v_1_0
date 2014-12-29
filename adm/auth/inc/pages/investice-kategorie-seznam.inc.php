              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Investice - Úprava kategorie</h1>
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
    ->from('categories')//
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
                                      <th class=\"date\">Id</th>
                                      <th class=\"name2\">Název kategorie</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"date\">".$radek['id']."</td>\n"; // 
  echo "<td class=\"name2\">".$radek['nazev']."</td>\n"; //  
  echo "<td class=\"action\"><a title=\"Smazat kategorii\" href=\"index.php?page=investice-kategorie-del&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat kategorii\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Vytvoření nové investice" href="index.php?page=investice-nova-strana" class="btn-red-white">Nová investice</a>
                  </div>

              <div class="clear"></div> 