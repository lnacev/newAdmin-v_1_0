<?php
  // zde je include souboru s konstantami
//require_once "config/config.inc.php";

$o_idx = $_GET['id'];

$vysledek_vlozenix = mysql_query("DELETE FROM `gallery_categories` WHERE `id` = '$o_idx'");
//$vysledek_vlozenix2 = mysql_query("DELETE FROM `gallery_kat` WHERE `foto` = '$o_idx'");

/*
if (!$vysledek_vlozenix)
die('Nepodařilo se vložit nový řádek.'. mysql_error());

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=sluzby-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);  
*/
?>
              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Galerie - seznam</h1>
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
    ->from('gallery_categories')//
    ->groupBy('category_name')
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
                                      <th class=\"name2\">Název galerie</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"date\">".$radek['id']."</td>\n"; // 
  echo "<td class=\"name2\"><a class=\"galery-a\" href=\"index.php?page=galerie-seznam&amp;idK=".$radek['id']."\" title=\"\">".$radek['category_name']."</a></td>\n"; //   
  echo "<td class=\"action\"><a title=\"Upravit galerii\" href=\"index.php?page=galerie-edit-kategorie&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit galerii\" src=\"imgs/edit-icon.gif\"></a><a title=\"Smazat galerii\" onclick=\"return confirm('Chcete opravdu smazat tuto galerii?')\" href=\"index.php?page=galerie-kategorie-seznam&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Smazat galerii\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
//  echo "<td class=\"action\">X</td>\n"; //
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Vytvoření nové galerie" href="index.php?page=galerie-nova-kategorie" class="btn-red-white">Nová galerie</a>
                  </div>

              <div class="clear"></div> 