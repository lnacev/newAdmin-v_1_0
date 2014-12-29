<?php
  // zde je include souboru s konstantami
//require_once "config/config.inc.php";

$o_idx = $_GET['id'];

$vysledek_vlozenix = mysql_query("DELETE FROM `gallery` WHERE `id` = '$o_idx'");
$vysledek_vlozenix2 = mysql_query("DELETE FROM `gallery_kat` WHERE `foto` = '$o_idx'");

/*
if (!$vysledek_vlozenix)
die('Nepodařilo se vložit nový řádek.'. mysql_error());

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=sluzby-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);  
*/
?>
              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Položky v galerii</h1>
                      
                  </div>
                  <?php
//require_once "inc/db_conn.php";
//require_once('inc/dbplibc.php');
$whx = '`gallery_categories`.`id`="'.$_GET['idK'].'"';
$db = new db_connection(SQL_HOST,SQL_USERNAME,SQL_PASSWORD,SQL_DBNAME);
// priprava dotazu
$dotaz = $db->select('gallery.foto:productname', 'gallery_categories.category_name:katname', 'gallery_categories.id:katIDX', 'gallery.id') //
    ->from('gallery')//
    ->joinOn('gallery_kat', '`gallery`.`id`=`gallery_kat`.`foto`', 'LEFT') //
    ->joinOn('gallery_categories', '`gallery_kat`.`category`=`gallery_categories`.`id`') //
    ->orderBy('gallery.id DESC')
		->where($whx); //

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
                                      <th class=\"date\">&nbsp;</th>
                                      <th class=\"picture\">Obrázek</th>
                                      <th class=\"title\">Kategorie</th>
                                      
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"id\">".$radek['id']."</td>\n"; //
  echo "<td class=\"date\">&nbsp;</td>\n"; // 
  echo "<td class=\"name\"><img src=\"uploads/".$radek['productname']."\" class=\"tonus\" height=\"80\" alt=\"".$radek['productname']."\" title=\"".$radek['productname']."\" /></td>\n"; // 
  echo "<td class=\"title\">".$radek['katname']."</td>\n"; // 
  
//  echo "<td class=\"action\"><a title=\"Upravit stránku\" href=\"index.php?page=editace_obsahu&amp;id=".$radek['id']."\"><img width=\"25\" height=\"25\" alt=\"Upravit stránku\" src=\"imgs/edit-icon.gif\"></a><a title=\"Přidat podstránku\" href=\"#\"><img width=\"25\" height=\"25\" alt=\"Přidat podstránku\" src=\"imgs/add-icon.gif\"></a><a title=\"Smazat stránku\" href=\"#\"><img width=\"25\" height=\"25\" alt=\"Smazat stránku\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "<td class=\"action\"><a title=\"Smazat stránku\" onclick=\"return confirm('Chcete opravdu smazat tento soubor?')\" href=\"index.php?page=galerie-seznam&amp;idK=".$radek['katIDX']."&amp;id=".$radek['id']."\"\><img width=\"25\" height=\"25\" alt=\"Smazat stránku\" src=\"imgs/delete-icon.gif\"></a></td>\n"; //

	echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Vytvoření nového obrázku" href="index.php?page=galerie-nova-strana" class="btn-red-white">Nový obrázek</a>
									</div>

              <div class="clear"></div> 
