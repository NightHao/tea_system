<?php
 header("Content-type:text/html;charset=utf-8");
 include_once "db_conn.php";

 $brandname = $_POST["brandname"];
 $shopname = $_POST["shopname"];
 $category = $_POST["category"];
 $name = $_POST["name"];
 $price = $_POST["price"];
 $size = $_POST["size"];
 $address = $_POST["address"];
 $time = $_POST["time"];
 $info = $_POST["info"];

 $query = ("update drink set category=?,name=?,price=?,size=?,info=? where shopname=?");
 $stmt = $db->prepare($query);
 $stmt->execute(array($category,$name,$price,$size,$info,$shopname));

 $query = ("update drinkshop set address=?,brandname=?,time=? where shopname=?");
 $stmt = $db->prepare($query);
 $stmt->execute(array($address,$brandname,$time,$shopname));

 header("Location:drink.php");
?>