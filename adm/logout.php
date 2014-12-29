<?
 session_start();
 $_SESSION = array();
 session_destroy();
 //Ověř zda došlo ke korektnímu ukončení session
 if ($_SESSION["user_is_logged"]){
  echo "FATAL ERROR: Cannot terminate session!";
  } else {
   //pokud je vše o.k., pošli uživatelovi přihlašovací dialog 
   //(nebo jinou  vhodnou stránku podle vlastního uvážení)
   header("Location: login.php");
  }  
?>