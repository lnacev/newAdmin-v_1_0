<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
/* $test = $_POST['page-name'];
 $test2 = $test;
 $test2 = preg_replace('~[^\\pL0-9_]+~u', '-', $test2);
 $test2 = trim($test2, "-");
 $test2 = iconv("utf-8", "us-ascii//TRANSLIT", $test2);
 $test2 = strtolower($test2);
 $test2 = preg_replace('~[^-a-z0-9_]+~', '', $test2);
*/ 
function preved($s)
 {
  $s = preg_replace('~[^\\pL0-9_]+~u', '-', $s);
  $s = trim($s, "-");
  $s = strtolower($s);    
    static $tbl = array("\xc3\xa1"=>"a","\xc3\xa4"=>"a","\xc4\x8d"=>"c","\xc4\x8f"=>"d","\xc3\xa9"=>"e","\xc4\x9b"=>"e","\xc3\xad"=>"i","\xc4\xbe"=>"l","\xc4\xba"=>"l","\xc5\x88"=>"n","\xc3\xb3"=>"o","\xc3\xb6"=>"o","\xc5\x91"=>"o","\xc3\xb4"=>"o","\xc5\x99"=>"r","\xc5\x95"=>"r","\xc5\xa1"=>"s","\xc5\xa5"=>"t","\xc3\xba"=>"u","\xc5\xaf"=>"u","\xc3\xbc"=>"u","\xc5\xb1"=>"u","\xc3\xbd"=>"y","\xc5\xbe"=>"z","\xc3\x81"=>"A","\xc3\x84"=>"A","\xc4\x8c"=>"C","\xc4\x8e"=>"D","\xc3\x89"=>"E","\xc4\x9a"=>"E","\xc3\x8d"=>"I","\xc4\xbd"=>"L","\xc4\xb9"=>"L","\xc5\x87"=>"N","\xc3\x93"=>"O","\xc3\x96"=>"O","\xc5\x90"=>"O","\xc3\x94"=>"O","\xc5\x98"=>"R","\xc5\x94"=>"R","\xc5\xa0"=>"S","\xc5\xa4"=>"T","\xc3\x9a"=>"U","\xc5\xae"=>"U","\xc3\x9c"=>"U","\xc5\xb0"=>"U","\xc3\x9d"=>"Y","\xc5\xbd"=>"Z");
    return strtr($s, $tbl);
 }
 $test2 = preved($_POST['page-name']);
 
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
        $_FILES['uploaded']['type'] == 'application/pdf') {
        
       /* if (file_exists("upload/" . $_FILES["file"]["name"]))
  unlink("upload/" . $_FILES["file"]["name"]));
       */
 
      $result = move_uploaded_file($_FILES['uploaded']['tmp_name'], 'download/upload/'.$_FILES['uploaded']['name']);
    
      if ($result) {
      //Proměnné
$nazev = SERVER_NAME."dev/balonparty/adm/auth/inc/download/upload/".$_FILES['uploaded']['name'];

//$o_kategorie = $_POST['category-name'];
//$o_type = $_FILES['uploaded']['type'];
//$o_size = $_FILES['uploaded']['size'];

$o_id_novinky = $test2;
$o_url_stranky = $test2;
$datum = $_POST['date'];
$datumx = date('Y-m-d', str_replace('.','-',strtotime($datum)));
$o_datum = $datumx;
$o_nazev_novinky = $_POST['page-name'];
//$o_kratky_popis =  $_POST['annotation'];
//$o_kategorie = $_POST['categories'];
$o_clanek = $_POST['tiny'];

$vysledek_vlozeni = mysql_query("INSERT into news (`datum`, `nazev-novinky`, `url-stranky`, `clanek`, `soubor`) values ('$o_datum', '$o_nazev_novinky', '$o_url_stranky', '$o_clanek', '$nazev')");
$nove_idx= mysql_insert_id();
if (!$vysledek_vlozeni)
die('Nepodařilo se vložit nový řádek.'. mysql_error());
      } else {
        echo "error ocured!";
      } 

    } else {
      echo "Nepovolený soubor!";
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

$vysledek_vlozeni = mysql_query("INSERT into news (`datum`, `nazev-novinky`, `url-stranky`, `clanek`) values ('$o_datum', '$o_nazev_novinky', '$o_url_stranky', '$o_clanek')");
if (!$vysledek_vlozeni)
die('Nepodařilo se vložit nový řádek.'. mysql_error());

  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/dev/balonparty/adm/auth/index.php?page=novinky-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);   
//***
}
        $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/dev/balonparty/adm/auth/index.php?page=novinky-seznam";
        Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path); 
}
?>         