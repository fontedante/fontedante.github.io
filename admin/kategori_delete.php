<?php

require "includes/header.php";

 $id = $_GET['id'];

 $query = mysql_query("delete from kategori where id_kategori = '$id'");

 if($query){
     echo "<meta http-equiv='refresh' content='0, url=".BASE_URL."admin/kategori.php'/>";
 }