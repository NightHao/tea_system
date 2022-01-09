<?php
 header("Content-type:text/html;charset=utf-8");
 include_once "db_conn.php";

 $shopname = $_POST["shopname"];
 $name = $_POST["name"];

 $query = ("delete from drink where shopname=? AND name=?");
 $stmt = $db->prepare($query);
 $stmt->execute(array($shopname,$name));

 header("Location:drink.php");
?>