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

//$o_login = $test2;
$o_name = $_POST['firstname'];
$o_sureName = $_POST['lastname'];
$o_email = $_POST['email'];
$o_password = $_POST['password'];
//$o_password = md5($_POST['password']);
$o_ulice = $_POST['ulice'];
$o_cp = $_POST['cp'];
$o_mesto = $_POST['mesto'];
$o_psc = $_POST['psc'];
$o_souhlas = $_POST['souhlas'];
//$o_password2 = $_POST['password2'];
//$o_rules = $_POST['role'];

$qry = "INSERT INTO users_registred (`username`, `surename`, `email`, `password`, `ulice`, `cp`, `mesto`, `psc`, `souhlas`) VALUES ('$o_name', '$o_sureName', '$o_email', '$o_password', '$o_ulice', '$o_cp', '$o_mesto', '$o_psc', '$o_souhlas')";
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