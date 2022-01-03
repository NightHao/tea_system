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

 if (isset($shopname))
 {

     if(!empty($shopname))
     {
        $query = ("select * from brand where shopname='$shopname' AND brandname='$brandname'");
        $stmt = $db->prepare($query);
        $error = $stmt->execute();
        $result = $stmt->fetchAll();

        if (count($result)>0) {
            // 取得大於0代表有資料
        }
        else{
            $query = ("insert into brand values(?,?)");
            $stmt = $db->prepare($query);
            $stmt->execute(array($brandname,$shopname));
        }
            // 釋放資料庫查到的記憶體
        $query = ("select * from drinkshop where shopname='$shopname' AND address='$address'");
        $stmt = $db->prepare($query);
        $error = $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result)>0) {
            // 取得大於0代表有資料
        }
        else{
            $query = ("insert into drinkshop values(?,?,?,?)");
            $stmt = $db->prepare($query);
            $stmt->execute(array($shopname,$address,$brandname,$time));
        }
        
        $query = ("select * from drink where shopname='$shopname' AND name='$name' AND price='$price'");
        $stmt = $db->prepare($query);
        $error = $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result)>0) {
            // 取得大於0代表有資料
            echo "錯誤訊息 -> 此primary key (shopname, name, price) 已存在";
            goto a;
        }
        else{
            $query = ("insert into drink values(?,?,?,?,?,?)");
            $stmt = $db->prepare($query);
            $stmt->execute(array($shopname,$category,$name,$price,$size,$info));
        }
        header("Location:drink.php");
        a:
     }
     else
     {
         echo "no input"."\n";
     }
 }
 else
 {
     echo "error";
 }

?>