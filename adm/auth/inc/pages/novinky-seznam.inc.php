<?php 
$o_idx = $_GET['id'];

$vysledek_vlozenix = mysql_query("DELETE FROM `news` WHERE `id` = '$o_idx'");?>
              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Novinky</h1>
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
    ->from('news')//
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
                                      <th class=\"date\">Datum a čas</th>
                                      <th class=\"name\">Název novinky</th>
                                      <th class=\"annotation\">Příloha/Foto</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"date\">".$radek['datum']."</td>\n"; // 
  echo "<td class=\"name\">".$radek['nazev-novinky']."</td>\n"; // 
  echo "<td class=\"annotation\">";
	if($radek['soubor']=="none"){echo "Ne";}else{echo "Ano";}
	echo "</td>\n"; // 
  echo "<td class=\"action\"><a title=\"Upravit novinku\" href=\"index.php?page=novinky-edit&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit novinku\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat novinku\" onclick=\"return confirm('Chcete opravdu smazat tento soubor?')\" href=\"index.php?page=novinky-seznam&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat novinku\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Vytvoření nové novinky" href="index.php?page=novinky-nova-strana" class="btn-red-white">Nová novinka</a>
                  </div>

              <div class="clear"></div> 