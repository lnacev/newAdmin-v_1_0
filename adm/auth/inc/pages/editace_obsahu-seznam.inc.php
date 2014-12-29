<?php 
$o_idx = $_GET['id'];

$vysledek_vlozenix = mysql_query("DELETE FROM `clanky` WHERE `id` = '$o_idx'");?>
              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Stránky webové prezentace</h1>
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
    ->from('clanky')//
    //->joinOn('kategories', '`product_kat`.`kategorie`=`kategories`.`id`') //
    ->orderBy('id');

// priprava strankovani
$limit = 10;
$pager = new pager($limit);
$pager->count = $dotaz->match(true); // spocitani celkoveho poctu polozek

// pridat limit do dotazu
$dotaz->limit($pager->offset(), $limit);

// vypis polozek
$vysledek = $dotaz->exec();
                          
                     echo "<table id=\"content-table\">
                                  <tbody><tr>
                                      <th class=\"id\">Id</th>
                                      <th class=\"date\">Nadpis stránky</th>
                                      <th class=\"name\">Klíčová slova</th>
                                      <th class=\"title\">Meta popis</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"id\">".$radek['id']."</td>\n"; //
  echo "<td class=\"title\">".$radek['nazev']."</td>\n"; //
  echo "<td class=\"date\">".$radek['keywords']."</td>\n"; // 
  echo "<td class=\"name\">".$radek['description']."</td>\n"; // 
 
//  echo "<td class=\"action\"><a title=\"Upravit stránku\" href=\"index.php?page=editace_obsahu&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit stránku\" src=\"imgs/edit-icon.gif\"></a><a title=\"Přidat podstránku\" href=\"#\"><img width=\"25\" height=\"25\" alt=\"Přidat podstránku\" src=\"imgs/add-icon.gif\"></a><a title=\"Smazat stránku\" href=\"#\"><img width=\"25\" height=\"25\" alt=\"Smazat stránku\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "<td class=\"action\"><a title=\"Upravit stránku\" href=\"index.php?page=editace_obsahu&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit stránku\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat stránku\" onclick=\"return confirm('Chcete opravdu smazat tento soubor?')\" href=\"index.php?page=editace_obsahu-seznam&amp;id=".$radek['id']."\"\><img width=\"25\" height=\"25\" alt=\"Smazat stránku\" src=\"imgs/delete-icon.gif\"></a></td>\n"; //
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Vytvoření nové stránky" href="index.php?page=editace_obsahu-nova-strana" class="btn-red-white">Nová stránka</a>
                  </div>

              <div class="clear"></div> 
