<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
 $test = $_POST['sluzby-firma'];
 $test2 = $test;
 $test2 = preg_replace('~[^\\pL0-9_]+~u', '-', $test2);
 $test2 = trim($test2, "-");
 $test2 = iconv("utf-8", "us-ascii//TRANSLIT", $test2);
 $test2 = strtolower($test2);
 $test2 = preg_replace('~[^-a-z0-9_]+~', '', $test2);
?>
<?php
  // zde je include souboru s konstantami
 require_once "config/config.inc.php";
 
  if(isset($_POST['upload'])){
  if (is_uploaded_file($_FILES['uploaded']['tmp_name'])) {
    if ($_FILES['uploaded']['type'] == 'image/gif' ||
        $_FILES['uploaded']['type'] == 'image/jpeg' ||
        $_FILES['uploaded']['type'] == 'image/pjpeg' ||
        $_FILES['uploaded']['type'] == 'image/bmp' ||
        $_FILES['uploaded']['type'] == 'image/png') {
        
       /* if (file_exists("upload/" . $_FILES["file"]["name"]))
  unlink("upload/" . $_FILES["file"]["name"]));
       */
 
      $result = move_uploaded_file($_FILES['uploaded']['tmp_name'], 'download/upload/sluzby/'.$_FILES['uploaded']['name']);
    
      if ($result) {
      //Proměnné
$nazev = SERVER_NAME."adm/auth/inc/download/upload/sluzby/".$_FILES['uploaded']['name'];

//$o_id_novinky = $test2;
$o_nazev = $_POST['sluzby-firma'];
$o_adresa = $_POST['sluzby-adresa'];
$o_tel = $_POST['sluzby-tel'];
$o_web = $_POST['sluzby-www'];
$o_popis = $_POST['sluzby-desc']; 
$o_pic = $nazev;

/* $vysledek_vlozeni = mysql_query("INSERT into investice (`id_novinky`, `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek`, `soubor`) values ('$o_id_novinky', '$o_datum', '$o_nazev_novinky', '$o_url_stranky', '$o_kratky_popis', '$o_clanek', '$nazev')");
if (!$vysledek_vlozeni)
die('Nepodařilo se vložit nový řádek.'. mysql_error()); */

$qry = "INSERT into sluzby (`nazev`, `adresa`, `telefon`, `web`, `popis`, `logo`) values ('$o_nazev', '$o_adresa', '$o_tel', '$o_web', '$o_popis', '$o_pic')";
        $ret=mysql_query($qry);

        $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=sluzby-seznam";
        Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path); 
      } else {
        echo "error ocured!";
      } 

    } else {
      echo "Nepovolený soubor!";
    }
  }else{echo "Nevybrali jste soubor k nahrání...";}
}
?>         