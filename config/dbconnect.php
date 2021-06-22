<?php

define("BASE_URL", "http://localhost/tokonline/");
define("WEBNAME", "Tokonline");

$conn = mysql_connect("localhost", "root", "", "db_tokonline");

if(!mysql_select_db("db_tokonline")){
	echo "Database Tidak Terhubung..";
}

?>


