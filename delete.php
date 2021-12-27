<?php
 header("Content-type:text/html;charset=utf-8");
 include_once "db_conn.php";

 $shopname = $_POST["shopname"];
 $brandname = $_POST["brandname"];

 $query = ("delete from drink where shopname=?");
 $stmt = $db->prepare($query);
 $stmt->execute(array($shopname));

 $query = ("delete from brand where brandname=?");
 $stmt = $db->prepare($query);
 $stmt->execute(array($brandname));

 header("Location:drink.php");
?>