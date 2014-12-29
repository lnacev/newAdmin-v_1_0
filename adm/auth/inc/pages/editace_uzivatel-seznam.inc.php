              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Seznam uživatelů</h1>
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
    ->from('users')//
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
                                      <th class=\"name\">Uživatelské jméno</th>
                                      <th class=\"log\">Poslední přihlášení</th>
                                      <th class=\"role\">Práva</th>
                                      <th class=\"action\">Akce</th>
                                  </tr>";
while($radek = $vysledek->row()) {                     
  echo "<tr class=\"table-hover\">\n";
  echo "<td class=\"id\">".$radek['id']."</td>\n"; // 
  echo "<td class=\"name\">".$radek['username']."</td>\n"; // 
  echo "<td class=\"log\">".$radek['ip-zaznam']."</td>\n"; // 
  echo "<td class=\"role\">".$radek['rules']."</td>\n"; //
  echo "<td class=\"action\">--<!--<a title=\"Upravit nastavení účtu\" href=\"index.php?page=editace_uzivatel&amp;id={$radek['id']}\"><img width=\"25\" height=\"25\" alt=\"Upravit nastavení účtu\" src=\"imgs/edit-icon.gif\"></a><a title=\"Odstranit uživatelský účet\" href=\"#\"><img width=\"25\" height=\"25\" alt=\"Odstranit uživatelský účet\" src=\"imgs/delete-icon.gif\"></a>--></td>\n"; // 
  echo "</tr>\n"; 
} 
echo "</tbody></table>\n";
echo "<br />";
echo "<br />";
echo $pager->pages(); ?>       
                                   
                              <!--<a title="Nový uživatels" href="index.php?page=editace_uzivatel-novy" class="btn-red-white">Nový uživatel</a>-->
                  </div>

              <div class="clear"></div> 