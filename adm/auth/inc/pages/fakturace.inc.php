<?php
//require_once "config/config.inc.php";
$o_idx = $_GET['id'];
//$o_url = $_POST['www'];
//$o_name = $_POST['name'];

$vysledek_vlozeni2 = mysql_query("DELETE FROM `products` WHERE `id` = '$o_idx'");
if (!$vysledek_vlozeni2)
die('Nepodařilo se smazat řádek.'. mysql_error());
//
$vysledek_vlozeni3 = mysql_query("DELETE FROM `product_kat` WHERE `id` = '$o_idx'");
if (!$vysledek_vlozeni3)
die('Nepodařilo se smazat řádek.'. mysql_error());
//  $path2=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=editace_uzivatel-seznam-registr";
//  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path2);  
?>
              <div class="table-list-wrap">
                  <div class="table-list-top">
                      <h1>Faktura</h1>
                      <!--<ul class="table-list-tabs">
                            <li class="selected"><a title="Zveřejněné" href="#">Zveřejněné</a></li>
                            <li><a title="Nezveřejněné" href="#">Nezveřejněné</a></li>
                      </ul>-->
                  </div>
                       
                       
                       
                       
            <?php
$id_x = $_GET['id'];
//require_once "inc/db_conn.php";
//require_once('inc/dbplibc.php');

$db = new db_connection(SQL_HOST,SQL_USERNAME,SQL_PASSWORD,SQL_DBNAME);
// priprava dotazu
// priprava dotazu
$dotaz = $db->select('*') //
    ->from('kosik')//
    ->where('id='.$id_x)
//    ->joinOn('product_kat', '`products`.`id`=`product_kat`.`produkty`', 'LEFT') //
//    ->joinOn('kategories', '`product_kat`.`kategorie`=`kategories`.`id`') //
//    ->orderBy('kategories.name');
;
// priprava strankovani
$limit = 1;
$pager = new pager($limit);
$pager->count = $dotaz->match(true); // spocitani celkoveho poctu polozek

// pridat limit do dotazu
$dotaz->limit($pager->offset(), $limit);

// vypis polozek
$vysledek = $dotaz->exec();
                          
                     echo "<table class=\"fakt\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\" border=\"0\">";
//$m = 0; // pomocná proměnná, můžeme ji zároveň použít pro číslování řádků   
//postupne ziskavani jednotlivych zaznamu z vysledkove sady
while($radek = $vysledek->row()) {                     
  echo "<tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Číslo faktury:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['faktura']."</td>
		  </tr>
			<tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Jméno a příjmení:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['jmeno']."&nbsp;".$radek['prijmeni']."</td>
		  </tr>
      <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;e-mail:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['email']."</td>
		  </tr>
      <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Telefon:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['telefon']."</td>
		  </tr>
      <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Ulice:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['ulice']."&nbsp;".$radek['cislo']."</td>
		  </tr>
      <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Město:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['mesto']."</td>
		  </tr>
		  <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;PSČ:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['psc']."</td>
		  </tr>
		  <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Firma:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['firma']."</td>
		  </tr>
		  <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;IČ:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['ic']."</td>
		  </tr>
		  <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;DIČ:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['dic']."</td>
		  </tr>
		  <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Doprava:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['doprava']."&nbsp;Kč</td>
		  </tr>
		  <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Balné:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['platba']."&nbsp;Kč</td>
		  </tr>
		  <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Zprava:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['zprava']."</td>
		  </tr>
		  <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Produkty:</td>
			<td width=\"75%\" align=\"left\">&nbsp;";
      //var_dump($radek['produkt']);
      echo $radek['produkt'];
      echo "</td>
		  </tr>
      <tr> 
			<td class=\"bold\" width=\"25%\" align=\"right\">&nbsp;Celková cena:</td>
			<td width=\"75%\" align=\"left\">&nbsp;".$radek['cena']."&nbsp;Kč</td>
		  </tr>\n"; 
} 
echo "</table>\n"; ?>           
                       
                       
                       
                       
                       
                         
                                   
                              <!--<a title="Vytvoření nového produktu" href="index.php?page=eshop-nova-strana" class="btn-red-white">Nový produkt</a>-->
                  </div>

              <div class="clear"></div> 