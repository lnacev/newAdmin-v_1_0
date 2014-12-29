<?php 
define("SQL_HOST","31.31.77.167");
define("SQL_DBNAME","c1serialy"); /* *** change on prod db name *** */
define("SQL_USERNAME","c1serialy"); /* *** change on prod db username *** */
define("SQL_PASSWORD","pwdserialy10"); /* *** change on prod password *** */
//
require_once "db_conn.inc.php";
require_once('dbplibc.inc.php');
//$pathDir = "http://".$_SERVER['SERVER_NAME']."/";
define("SERVER_NAME","http://".$_SERVER['SERVER_NAME']."/");
?>