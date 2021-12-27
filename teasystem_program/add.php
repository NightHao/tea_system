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

 $query = ("insert into drink values(?,?,?,?,?,?)");
 $stmt = $db->prepare($query);
 $stmt->execute(array($shopname,$category,$name,$price,$size,$info));

 $query = ("insert into brand values(?,?)");
 $stmt = $db->prepare($query);
 $stmt->execute(array($brandname,$shopname));

 $query = ("insert into drinkshop values(?,?,?,?)");
 $stmt = $db->prepare($query);
 $stmt->execute(array($shopname,$address,$brandname,$time));

 header("Location:drink.php");
?>