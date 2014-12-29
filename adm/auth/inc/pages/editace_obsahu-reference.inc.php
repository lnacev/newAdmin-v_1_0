<?php require_once "inc/class/cutString.php";
$o_idx = $_GET['id'];

$vysledek_vlozenix = mysql_query("DELETE FROM `reference` WHERE `id` = '$o_idx'");?>
              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Stránky webové prezentace</h1>
                  </div>
                  <?php
//require_once "inc/db_conn.php";
//require_once('inc/dbplibc.php');

$db = new db_connection(SQL_HOST,SQL_USERNAME,SQL_PASSWORD,SQL_DBNAME);
// priprava dotazu
$dotaz = $db->select('*') //
    ->from('reference')//
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
                                      <th class=\"date\">Nadpis reference</th>
                                      <th class=\"name\">Text</th>
                                      <th class=\"title\">Jméno</th>
                                      <th class=\"action\">Město</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"id\">".$radek['id']."</td>\n"; //
  echo "<td class=\"title\">".$radek['nazev']."</td>\n"; //
  echo "<td class=\"date\">";
	orez($radek['text']);
	echo "</td>\n"; // 
  echo "<td class=\"name\">".$radek['jmeno']."</td>\n"; // 
  echo "<td class=\"name\">".$radek['mesto']."</td>\n"; //
//  echo "<td class=\"action\"><a title=\"Upravit stránku\" href=\"index.php?page=editace_obsahu&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit stránku\" src=\"imgs/edit-icon.gif\"></a><a title=\"Přidat podstránku\" href=\"#\"><img width=\"25\" height=\"25\" alt=\"Přidat podstránku\" src=\"imgs/add-icon.gif\"></a><a title=\"Smazat stránku\" href=\"#\"><img width=\"25\" height=\"25\" alt=\"Smazat stránku\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "<td class=\"action\"><a title=\"Upravit stránku\" href=\"index.php?page=editace_reference-edit&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit stránku\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat stránku\" onclick=\"return confirm('Chcete opravdu smazat tento soubor?')\" href=\"index.php?page=editace_obsahu-reference&amp;id=".$radek['id']."\"\><img width=\"25\" height=\"25\" alt=\"Smazat stránku\" src=\"imgs/delete-icon.gif\"></a></td>\n"; //
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Vytvoření nové stránky" href="index.php?page=editace_reference-nova-strana" class="btn-red-white">Nová stránka</a>
                  </div>

              <div class="clear"></div> 
