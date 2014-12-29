<?php
//require_once "config/config.inc.php";
$o_id2 = $_GET['id'];
//$o_url = $_POST['www'];
//$o_name = $_POST['name'];

$vysledek_vlozeni2 = mysql_query("DELETE FROM `users_registred` WHERE `id` = '$o_id2'");
if (!$vysledek_vlozeni2)
die('Nepodařilo se vložit nový řádek.'. mysql_error());

//  $path2=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=editace_uzivatel-seznam-registr";
//  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path2);  
?>
               <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Seznam zákazníků</h1>
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
    ->from('users_registred')//
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
                          
                     echo "<table id=\"users-table\">
                                  <tbody><tr>
                                      <th class=\"id\">Id</th>
                                      <th class=\"name\">Jméno a Příjmení</th>
                                      <th class=\"log\">E-mail</th>
                                      <th class=\"role\">Souhlas s newsletterem</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"id\">".$radek['id']."</td>\n"; // 
  echo "<td class=\"name\">".$radek['username']."&nbsp;".$radek['surename']."</td>\n"; // 
  echo "<td class=\"log\">".$radek['email']."</td>\n"; // 
  echo "<td class=\"role\">";
	if($radek['souhlas']==1){echo"Ano";}else{echo"Ne";}
	echo "</td>\n"; //
  echo "<td class=\"action\"><a title=\"Upravit nastavení účtu\" href=\"index.php?page=editace_uzivatel&amp;id={$radek['id']}\"><img width=\"25\" height=\"25\" alt=\"Upravit nastavení účtu\" src=\"imgs/edit-icon.gif\"></a><a title=\"Odstranit uživatelský účet\" onclick=\"return confirm('Chcete opravdu smazat tento soubor?')\" href=\"index.php?page=editace_uzivatel-seznam-registr&amp;id={$radek['id']}\"><img width=\"25\" height=\"25\" alt=\"Odstranit uživatelský účet\" src=\"imgs/delete-icon.gif\"></a></td>\n"; // 
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <a title="Nový uživatels" href="index.php?page=editace_uzivatel-novy-registr" class="btn-red-white">Nový zákazník</a>
                  </div>

              <div class="clear"></div>