<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
/* $test = $_POST['page-name'];
 $test2 = $test;
 $test2 = preg_replace('~[^\\pL0-9_]+~u', '-', $test2);
 $test2 = trim($test2, "-");
 $test2 = iconv("utf-8", "us-ascii//TRANSLIT", $test2);
 $test2 = strtolower($test2);
 $test2 = preg_replace('~[^-a-z0-9_]+~', '', $test2);
*/
  // zde je include souboru s konstantami
require_once "config/config.inc.php";

$o_id = $_POST['id'];
$o_nazev = $_POST['sluzby-firma'];
$o_adresa = $_POST['sluzby-adresa'];
$o_tel = $_POST['sluzby-tel'];
$o_web = $_POST['sluzby-www'];
$o_popis = $_POST['sluzby-desc'];
//$o_pic = $nazev;
if(isset($_POST['upload'])){
$qry = "UPDATE `sluzby` SET `nazev` = '$o_nazev', `adresa` = '$o_adresa', `telefon` = '$o_tel', `web` = '$o_web', `popis` = '$o_popis' WHERE `sluzby`.`id` ='$o_id'" ; 
$ret=mysql_query($qry);
//
  if (is_uploaded_file($_FILES['uploaded']['tmp_name'])) {
    if ($_FILES['uploaded']['type'] == 'image/gif' ||
        $_FILES['uploaded']['type'] == 'image/jpeg' ||
        $_FILES['uploaded']['type'] == 'image/pjpeg' ||
        $_FILES['uploaded']['type'] == 'image/bmp' ||
        $_FILES['uploaded']['type'] == 'image/png') {
      $result = move_uploaded_file($_FILES['uploaded']['tmp_name'], 'download/upload/sluzby/'.$_FILES['uploaded']['name']);
      if ($result) {
$nazev = SERVER_NAME."adm/auth/inc/download/upload/sluzby/".$_FILES['uploaded']['name'];
        
$qry2 = "UPDATE `sluzby` SET `logo` = '$nazev' WHERE `sluzby`.`id` ='$o_id'" ; 
        $ret2=mysql_query($qry2);
        //echo "<strong>Přidání produktu proběhlo v pořádku ...</strong>";
//        $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=eshop-seznam";
//        Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path); 
      } else {
        echo "error ocured!";
      } 

    }else {echo "Nepodařil se vložit nový produkt!";}
  }
//
  $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=sluzby-seznam";
  Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);
}else{"error2";}  
?> 