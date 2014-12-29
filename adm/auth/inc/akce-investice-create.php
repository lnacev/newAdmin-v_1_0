<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
 $test = $_POST['page-name'];
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
    if ($_FILES['uploaded']['type'] == 'text/plain' ||
        $_FILES['uploaded']['type'] == 'application/vnd.ms-excel' ||
        $_FILES['uploaded']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
        $_FILES['uploaded']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
        $_FILES['uploaded']['type'] == 'application/msword' ||
        $_FILES['uploaded']['type'] == 'image/gif' ||
        $_FILES['uploaded']['type'] == 'image/jpeg' ||
        $_FILES['uploaded']['type'] == 'image/pjpeg' ||
        $_FILES['uploaded']['type'] == 'image/bmp' ||
        $_FILES['uploaded']['type'] == 'image/png' ||
        $_FILES['uploaded']['type'] == 'application/zip' ||
        $_FILES['uploaded']['type'] == 'application/x-zip' ||
        $_FILES['uploaded']['type'] == 'application/octet-stream' ||
        $_FILES['uploaded']['type'] == 'application/x-zip-compressed' ||
        $_FILES['uploaded']['type'] == 'application/x-rar-compressed' ||      
        $_FILES['uploaded']['type'] == 'application/pdf') {
        
       /* if (file_exists("upload/" . $_FILES["file"]["name"]))
  unlink("upload/" . $_FILES["file"]["name"]));
       */
 
      $result = move_uploaded_file($_FILES['uploaded']['tmp_name'], 'download/upload/'.$_FILES['uploaded']['name']);
    
      if ($result) {
      //Proměnné
$nazev = SERVER_NAME."adm/auth/inc/download/upload/".$_FILES['uploaded']['name'];

$o_id_novinky = $test2;
$o_url_stranky = $test2;
$datum = $_POST['date'];
$o_datum = $datum;
$o_nazev_novinky = $_POST['page-name'];
$o_kratky_popis =  $_POST['annotation'];
$o_kategorie = $_POST['categories'];
$o_clanek = $_POST['tiny'];

/* $vysledek_vlozeni = mysql_query("INSERT into investice (`id_novinky`, `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek`, `soubor`) values ('$o_id_novinky', '$o_datum', '$o_nazev_novinky', '$o_url_stranky', '$o_kratky_popis', '$o_clanek', '$nazev')");
if (!$vysledek_vlozeni)
die('Nepodařilo se vložit nový řádek.'. mysql_error()); */

$qry = "INSERT into investice (`id_novinky`, `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek`, `soubor`) values ('$o_id_novinky', '$o_datum', '$o_nazev_novinky', '$o_url_stranky', '$o_kratky_popis', '$o_clanek', '$nazev')";
        $ret=mysql_query($qry);

        $nove_id= mysql_insert_id();

        $qry = "INSERT INTO investice_kat (`clanky`, `kategorie`) values (".$nove_id.",".$o_kategorie.")";
        $ret=mysql_query($qry);

        $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=investice-seznam";
        Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path); 
      } else {
        echo "error ocured!";
      } 

    } else {
      echo "Nepovoleny soubor!";
    }
  }else{
//*** 
$o_id_novinky = $test2;
$o_url_stranky = $test2;
$datum = $_POST['date'];
$o_datum = $datum;
$o_nazev_novinky = $_POST['page-name'];
$o_kratky_popis =  $_POST['annotation'];
$o_kategorie = $_POST['categories'];
$o_clanek = $_POST['tiny'];

$vysledek_vlozeni = mysql_query("INSERT into investice (`id_novinky`, `datum`, `nazev-novinky`, `url-stranky`, `kratky-popis`, `clanek`) values ('$o_id_novinky', '$o_datum', '$o_nazev_novinky', '$o_url_stranky', '$o_kratky_popis', '$o_clanek')");

$nove_id2= mysql_insert_id();

        $qry2 = "INSERT INTO investice_kat (`clanky`, `kategorie`) values (".$nove_id2.",".$o_kategorie.")";
        $ret2=mysql_query($qry2);

if (!$vysledek_vlozeni)
die('Nepodařilo se vložit nový řádek.'. mysql_error());

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=investice-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);   
//***
}
}
?>         