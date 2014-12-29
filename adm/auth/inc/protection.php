<?
  session_start();
  //ob_start();
 $error_file="./../login.php";
 
 header("Cache-control: private");
 if ($_SESSION["user_is_logged"] != 1){
  header("Location: ".$error_file);
  exit();
  }
?>