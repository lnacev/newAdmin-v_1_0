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

$o_login = $test2;
$o_name = $_POST['firstname'];
$o_sureName = $_POST['lastname'];
$o_email = $_POST['email'];
$o_password = md5($_POST['password-new']);
//$o_password2 = $_POST['password2'];
$o_rules = $_POST['role'];

$qry = "INSERT INTO users (`username`, `jmeno`, `prijmeni`, `email`, `password`, `rules`) values ('$o_login', '$o_name', '$o_sureName', '$o_email', '$o_password', '$o_rules')";
        $ret=mysql_query($qry);
        
        if (!$qry)
        die('Nepodařilo se vložit nový řádek.'. mysql_error());
        //echo "<strong>Přidání produktu proběhlo v pořádku ...</strong>";
        $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/adm/auth/index.php?page=editace_uzivatel-seznam";
        Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);
?>         