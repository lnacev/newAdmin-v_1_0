<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
require_once "config/config.inc.php"; 
require('class/Gregphoto_Image.php');
require_once "class/csUtf2ascii.php";
//error_reporting(E_ALL); ini_set('display_errors', 'on');
$nove_idx = $_POST['id'];
//
$test = $_POST['page-name'];
$test2 = preved($test);
//
$o_key = $_POST['page-name'];
$o_desc = $_POST['page-name'];
$o_title = $_POST['page-name'];
$o_www = $test2;
//
if($_POST['categories']=="Latexové balónky - jednobarevné"){$_kategorie = "latexove-balonky";}
if($_POST['categories']=="Latexové balónky - jednobarevné"){$_subkategorie = "jednobarevne";}
if($_POST['categories']=="Latexové balónky - s potiskem"){$_kategorie = "latexove-balonky";}
if($_POST['categories']=="Latexové balónky - s potiskem"){$_subkategorie = "s-potiskem";}
if($_POST['categories']=="Latexové balónky - tvarované"){$_kategorie = "latexove-balonky";}
if($_POST['categories']=="Latexové balónky - tvarované"){$_subkategorie = "tvarovane";}
if($_POST['categories']=="Latexové balónky - modelovací balónky"){$_kategorie = "latexove-balonky";}
if($_POST['categories']=="Latexové balónky - modelovací balónky"){$_subkategorie = "modelovaci-balonky";}
if($_POST['categories']=="Latexové balónky - obří balóny"){$_kategorie = "latexove-balonky";}
if($_POST['categories']=="Latexové balónky - obří balóny"){$_subkategorie = "obri-balony";}
if($_POST['categories']=="Foliové balónky - jednobarevné"){$_kategorie = "foliove-balonky";}
if($_POST['categories']=="Foliové balónky - jednobarevné"){$_subkategorie = "jednobarevne";}
if($_POST['categories']=="Foliové balónky - s potiskem"){$_kategorie = "foliove-balonky";}
if($_POST['categories']=="Foliové balónky - s potiskem"){$_subkategorie = "s-potiskem";}
if($_POST['categories']=="Doplňky k balónkům"){$_subkategorie = NULL;}
if($_POST['categories']=="Doplňky k balónkům"){$_kategorie = "doplnky-k-balonkum";}
if($_POST['categories']=="Dekorační látky - Tyl"){$_kategorie = "dekoracni-latky";}
if($_POST['categories']=="Dekorační látky - Tyl"){$_subkategorie = "tyl";}
if($_POST['categories']=="Dekorační látky - Organza"){$_kategorie = "dekoracni-latky";}
if($_POST['categories']=="Dekorační látky - Organza"){$_subkategorie = "organza";}
//
if($_POST['categories']=="Stuhy"){$_kategorie = "stuhy";}
if($_POST['categories']=="Stuhy"){$_subkategorie = NULL;}
if($_POST['categories']=="Konfety"){$_kategorie = "konfety";}
if($_POST['categories']=="Konfety"){$_subkategorie = NULL;}
if($_POST['categories']=="Vystřelovací konfety"){$_kategorie = "vystrelovaci-konfety";}
if($_POST['categories']=="Vystřelovací konfety"){$_subkategorie = NULL;}
if($_POST['categories']=="Party doplňky"){$_kategorie = "party-doplnky";}
if($_POST['categories']=="Party doplňky"){$_subkategorie = NULL;}
//
if($_POST['vlastnost']=="Svatba"){$_vlastnost = "svatba";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Narozeniny"){$_vlastnost = "narozeniny";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Rozlučka se svobodou"){$_vlastnost = "rozlucka-se-svobodou";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Halloween"){$_vlastnost = "halloween";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Vánoce"){$_vlastnost = "vanoce";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Silvestr"){$_vlastnost = "silvestr";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Karneval"){$_vlastnost = "karneval";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Valentýn"){$_vlastnost = "valentyn";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Dětské motivy"){$_vlastnost = "detske-motivy";}//else{$_vlastnost = NULL;}
if($_POST['vlastnost']=="Narození dítěte"){$_vlastnost = "narozeni-ditete";}//else{$_vlastnost = NULL;}
//
$o_nazev = $_POST['page-name'];
$o_product = $_POST['tiny'];
$o_vel = $_POST['velikost'];
$o_cena = $_POST['cena'];
$o_doporucene = $_POST ['doporucujeme'];
$o_skladem = $_POST ['dodani'];
$o_timestamp = time();
//
  if(isset($_POST['upload'])){
        if(empty($_POST['categories'])){echo $qryxx = "UPDATE products2 SET `keywords` = '$o_key', `description` = '$o_desc', `title` = '$o_title', `www` = '$o_www', `vlastnost` = '$_vlastnost', `nazev` = '$o_nazev', `text` = '$o_product', `velikost` = '$o_vel', `cena` = '$o_cena', `doporucene` = '$o_doporucene', `skladem` = '$o_skladem' WHERE `products2`.`id` = '$nove_idx'";
				$retxx=mysql_query($qryxx) or die (mysql_error());}
				else{echo $qryxx = "UPDATE products2 SET `keywords` = '$o_key', `description` = '$o_desc', `title` = '$o_title', `www` = '$o_www', `kategorie` = '$_kategorie', `subkategorie` = '$_subkategorie', `vlastnost` = '$_vlastnost', `nazev` = '$o_nazev', `text` = '$o_product', `velikost` = '$o_vel', `cena` = '$o_cena', `doporucene` = '$o_doporucene', `skladem` = '$o_skladem' WHERE `products2`.`id` = '$nove_idx'";
				$retxx=mysql_query($qryxx) or die (mysql_error());}
  if (is_uploaded_file($_FILES['uploaded']['tmp_name'])) {
    if ($_FILES['uploaded']['type'] == 'image/gif' ||
        $_FILES['uploaded']['type'] == 'image/jpeg' ||
        $_FILES['uploaded']['type'] == 'image/pjpeg' ||
        $_FILES['uploaded']['type'] == 'image/bmp' ||
        $_FILES['uploaded']['type'] == 'image/png') {
$result = move_uploaded_file($_FILES['uploaded']['tmp_name'], '/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/'.$o_timestamp .'-'. $_FILES['uploaded']['name']);
      if ($result) {
        // generate thumbail for new image
        $img = new Gregphoto_image('/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/'.$o_timestamp .'-'. $_FILES['uploaded']['name']);
        $img->setMaxHeight(304);
        $img->setMaxWidth(304);
        $img->resize(Gregphoto_Image::BEST_FIT);
        $img->saveThumbnail('/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/nahled/'.$o_timestamp .'-'. $_FILES['uploaded']['name']);
       // $img1 = './../../upload/small/'.$_FILES['photo']['name'];
        $img1 = $o_timestamp .'-'. $_FILES['uploaded']['name'];
        
        $qry = "UPDATE products2 SET `pictures` = '$img1' WHERE `id` ='$nove_idx'";
        $ret=mysql_query($qry) or die (mysql_error());
      } else {
        echo "error ocured!";
      } 

    }else {echo "Nepodařil se vložit nový produkt!";}
  }else{echo"err 01";}
// Foto 2  
  if (is_uploaded_file($_FILES['uploaded2']['tmp_name'])) {
    if ($_FILES['uploaded2']['type'] == 'image/gif' ||
        $_FILES['uploaded2']['type'] == 'image/jpeg' ||
        $_FILES['uploaded2']['type'] == 'image/pjpeg' ||
        $_FILES['uploaded2']['type'] == 'image/bmp' ||
        $_FILES['uploaded2']['type'] == 'image/png') {
$result2 = move_uploaded_file($_FILES['uploaded2']['tmp_name'], '/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/'.$o_timestamp .'-'. $_FILES['uploaded2']['name']);
      if ($result2) {
        // generate thumbail for new image
        $img2 = new Gregphoto_image('/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/'.$o_timestamp .'-'. $_FILES['uploaded2']['name']);
        $img2->setMaxHeight(304);
        $img2->setMaxWidth(304);
        $img2->resize(Gregphoto_Image::BEST_FIT);
        $img2->saveThumbnail('/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/nahled/'.$o_timestamp .'-'. $_FILES['uploaded2']['name']);
       // $img1 = './../../upload/small/'.$_FILES['photo']['name'];
        $imgx2 = $o_timestamp .'-'. $_FILES['uploaded2']['name'];
        
//        $nove_id2= mysql_insert_id();

        $sql2 = "UPDATE products2 SET `pictures2` = '$imgx2' WHERE `id` ='$nove_idx'";
        $ret2=mysql_query($sql2) or die (mysql_error());
      } else {
        echo "error ocured!";
      } 

    }else {echo "Nepodařil se vložit nový produkt!";}
  }else{echo"err 02";}
// Foto 3  
  if (is_uploaded_file($_FILES['uploaded3']['tmp_name'])) {
    if ($_FILES['uploaded3']['type'] == 'image/gif' ||
        $_FILES['uploaded3']['type'] == 'image/jpeg' ||
        $_FILES['uploaded3']['type'] == 'image/pjpeg' ||
        $_FILES['uploaded3']['type'] == 'image/bmp' ||
        $_FILES['uploaded3']['type'] == 'image/png') {
$result3 = move_uploaded_file($_FILES['uploaded3']['tmp_name'], '/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/'.$o_timestamp .'-'. $_FILES['uploaded3']['name']);
      if ($result3) {
        // generate thumbail for new image
        $img3 = new Gregphoto_image('/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/'.$o_timestamp .'-'. $_FILES['uploaded3']['name']);
        $img3->setMaxHeight(304);
        $img3->setMaxWidth(304);
        $img3->resize(Gregphoto_Image::BEST_FIT);
        $img3->saveThumbnail('/var/www/clients/client0/web8/web/dev/balonparty/imgs-shop/nahled/'.$o_timestamp .'-'. $_FILES['uploaded3']['name']);
       // $img1 = './../../upload/small/'.$_FILES['photo']['name'];
        $imgx3 = $o_timestamp .'-'. $_FILES['uploaded3']['name'];
        
//        $nove_id3= mysql_insert_id();

        $sql3 = "UPDATE products2 SET `pictures3` = '$imgx3' WHERE `id` ='$nove_idx'";
        $ret3=mysql_query($sql3) or die (mysql_error());
      } else {
        echo "error ocured!";
      } 

    }else {echo "Nepodařil se vložit nový produkt!";}
  }else{echo"err 03";}       
        $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/dev/balonparty/adm/auth/index.php?page=eshop-seznam";
        Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);  

}else{"error2";} 
//
?>      