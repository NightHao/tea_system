<html>
    <head>
        <meta http-equiv='Content-type' content='text/html'; charset='utf-8'>
        <meta http-equiv="pragma" Content="No-cache"> <!-- 清除cache-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="index.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <center>
        <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
                
                <ul class="nav navbar-nav" >
                    <li class="nav-item">
                        <a class="navbar-brand" href="index.html">
                            <img src="img/cuplogo.png" alt="Logo" style="width:40px;">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">首頁</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="edit.html">編輯</a>
                    </li>
                </ul>
            </nav>
            <div class="jumbotron text-center", id="bar">
                <h1>台灣手搖茶系統</h1>
                <p>喝......茶......</p> 
            </div>
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
            echo "錯誤訊息 -> 此primary key (shopname, brandname) 已存在\n";
        }
        else{
            $query = ("insert into brand values(?,?)");
            $stmt = $db->prepare($query);
            $stmt->execute(array($brandname,$shopname));
        }
            // 釋放資料庫查到的記憶體
        $query = ("select * from drinkshop where shopname='$shopname' AND address='$address'");
        if(isset($address)){
            if(!empty($address)){
                $stmt = $db->prepare($query);
                $error = $stmt->execute();
                $result = $stmt->fetchAll();
                if (count($result)>0) {
                    // 取得大於0代表有資料
                    echo "錯誤訊息 -> 此primary key (shopname, address) 已存在\n";
                }
                else{
                    $query = ("insert into drinkshop values(?,?,?,?)");
                    $stmt = $db->prepare($query);
                    $stmt->execute(array($shopname,$address,$brandname,$time));
                }
            }
            else{
                echo "錯誤訊息 -> 請輸入地址\n";
            }
    }
        $query = ("select * from drink where shopname='$shopname' AND name='$name' AND price='$price'");
        $stmt = $db->prepare($query);
        $error = $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result)>0) {
            // 取得大於0代表有資料
            echo "錯誤訊息 -> 此primary key (shopname, name, price) 已存在\n";
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
         echo "
            <div class='col-md-4 block'>
                <br>
                <br>
                <br>
                <br>
                <h2>no input</h2>
                <h5s>請輸入資料！！</h5s>
            </div>
             "."\n";
     }
 }
 else
 {
     echo "error";
 }

?>

        </body>
    </center>
</html>