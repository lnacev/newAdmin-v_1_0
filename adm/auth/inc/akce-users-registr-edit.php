<?php setlocale(LC_CTYPE, "cs_CZ.utf-8"); 
/*
 $test = $_POST['page-name'];
 $test2 = $test;
 $test2 = preg_replace('~[^\\pL0-9_]+~u', '-', $test2);
 $test2 = trim($test2, "-");
 $test2 = iconv("utf-8", "us-ascii//TRANSLIT", $test2);
 $test2 = strtolower($test2);
 $test2 = preg_replace('~[^-a-z0-9_]+~', '', $test2); 
 */
?>
<?php 
try {
  // zde je include souboru s konstantami
require_once "config/config.inc.php";
$o_id = $_POST['id'];
//$o_login = $test2;
$o_name = $_POST['firstname'];
$o_sureName = $_POST['lastname'];
$o_email = $_POST['email'];
//$o_password = md5($_POST['password']);
$o_password = $_POST['password'];
$o_ulice = $_POST['ulice'];
$o_cp = $_POST['cp'];
$o_mesto = $_POST['mesto'];
$o_psc = $_POST['psc'];
$o_souhlas = $_POST['souhlas'];
//$o_password2 = $_POST['password2'];
//$o_rules = $_POST['role'];
$qry = "UPDATE `users_registred` SET `username` = '$o_name', `surename` = '$o_sureName', `email` = '$o_email', `password` = '$o_password', `ulice` = '$o_ulice', `cp` = '$o_cp', `mesto` = '$o_mesto', `psc` = '$o_psc', `souhlas` = '$o_souhlas' WHERE `users_registred`.`id` ='$o_id'" ;
        $ret=mysql_query($qry);
        
        if (!$qry)
        die('Nepodařilo se vložit nový řádek.'. mysql_error());
        //echo "<strong>Přidání produktu proběhlo v pořádku ...</strong>";
        $path=SubStr($SCRIPT_NAME, 0, StrRPos($SCRIPT_NAME,"/"))."/dev/balonparty/adm/auth/index.php?page=editace_uzivatel-seznam-registr";
        Header("Location: http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path);
        }

catch(Exception $e) {
 echo $e->getMessage();
 if(isset($e->debug_info)) echo ', info: '.$e->debug_info;
}
echo $qry;
?>         