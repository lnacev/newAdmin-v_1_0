<?php
//require_once "config.php"; 
 $spojeni = mysql_connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD) or die ('Spatne zadane udaje (asi heslo, server nebo jmeno.) v db_conn.php - ' . mysql_error());
  mysql_select_db(SQL_DBNAME, $spojeni) or die ('Nepodarilo se vybrat databazi. Asi zadana databaze v db_conn.php - '. mysql_error());
  mysql_query("SET NAMES utf8");   // Výsledky a dotazy budeme klást v kódování UTF8.
?>