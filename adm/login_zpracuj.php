<?php
session_start(); // Budeme pracovat se session, musíme je nastartovat.         
if(isset($_POST['user-name'])){
  require_once 'auth/inc/config/config.inc.php';
  $name = $_POST['user-name'];
  $pass = md5($_POST['password']);
  $ip = date('j.n.Y')."&nbsp;";
  $ip .= date('H:i:s');
  //$ip .= $_SERVER['REMOTE_ADDR'];  
    $query = mysql_query("SELECT * FROM `users` WHERE `username` = '$name' and `password` = '$pass'") or die (mysql_error());
    // Vybereme uživatele se zadaným jménem a heslem
      $Vysledek = mysql_fetch_array($query);
        if($Vysledek['username']){ // pokud tato proměnná obsahuje data, bylo zadané správné jméno a heslo
          // Do sessions si uložíme pár informací o přihlášeném
          $_SESSION['user_is_logged'] = 1;
          $_SESSION['login'] = $Vysledek['username'];
          $_SESSION['UserId'] = $Vysledek['id'];
          $_SESSION['UserPrava'] = $Vysledek['rules'];
          //
          //$qry = "INSERT INTO users (`ip-zaznam`) values (".$ip.")";
          $qry = "UPDATE `users` SET `ip-zaznam` = '$ip' WHERE `id` = {$Vysledek['id']}";
          $ret=mysql_query($qry);
          if (!$ret)
          die('Nepodařilo se vložit nový řádek.'. mysql_error());
          //      
          $protected1 ="auth/index.php";
          header("location: $protected1"); // přesměrujeme na index
          exit;
        }else{
          header("location: login.php"); // špatně zadané údaje
          exit;
          // echo "Zadal jsi špatné údaje";
        }
    mysql_free_result($query);
}else{
  echo "Zde nic není.";

}
//ob_end_flush();
?>