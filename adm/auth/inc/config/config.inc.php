<?php 
define("SQL_HOST","localhost"); /* *** change on prod ip or localhost *** */
define("SQL_DBNAME","*****"); /* *** change on prod db name *** */
define("SQL_USERNAME","*****"); /* *** change on prod db username *** */
define("SQL_PASSWORD","*****"); /* *** change on prod password *** */
//
require_once "db_conn.inc.php";
require_once('dbplibc.inc.php');
//$pathDir = "http://".$_SERVER['SERVER_NAME']."/";
define("SERVER_NAME","http://".$_SERVER['SERVER_NAME']."/");
?>
