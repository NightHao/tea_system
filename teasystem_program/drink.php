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
            <div class="jumbotron text-center", id="bar">
                <h1>台灣手搖茶系統</h1>
                <p>喝......茶......</p> 
            </div>
            <ul class="nav nav-tabs nav-justified" >
                <li class="nav-item col-md-2">
                    <a class="nav-link active " href="index.html">首頁</a>
                </li>
                <!-- <li class="nav-item col-md-2 ">
                    <a class="nav-link clickable" href="#" >搜尋</a>
                </li> -->
                <li class="nav-item col-md-2">
                    <a class="nav-link clickable" href="edit.html">編輯</a>
                </li>
                
            </ul>
            <div class='container', style= 'margin-top: 10px;'>
                <table class='block'>
                    <tr>
                        <th>品牌名稱</th>
                        <th>商家名稱</th>
                        <th>飲料種類</th>
                        <th>飲料名稱</th>
                        <th>價錢</th>
                        <th>大小</th>
                        <th>地址</th>
                        <th>營業時間</th>
                        <th>備註</th>
                    </tr>
                    <?php
                        header("Content-type:text/html;charset=utf-8");
                        include "db_conn.php";
                        $shopname = "";
                        $query = ("select * from drink natural left outer join brand natural join drinkshop");
                        $stmt = $db->prepare($query);
                        $error = $stmt->execute();
                        $result = $stmt->fetchAll();
                        for($i=0; $i < count($result); $i++){
                            $brandname = $result[$i]['brandname'];
                            $shopname = $result[$i]['shopname'];
                            $category = $result[$i]['category'];
                            $name = $result[$i]['name'];
                            $price = $result[$i]['price'];
                            $size = $result[$i]['size'];
                            $address = $result[$i]['address'];
                            $time = $result[$i]['time'];
                            $info = $result[$i]['info'];
                            newRow($brandname, $shopname, $category, $name, $price, $size, $address, $time, $info);
                        }


                        function newRow($brandname, $shopname, $category, $name, $price, $size, $address, $time, $info){
                            echo "<tr>";
                            echo "<td>".$brandname."</td>";
                            echo "<td>".$shopname."</td>";
                            echo "<td>".$category."</td>";
                            echo "<td>".$name."</td>";
                            echo "<td>".$price."</td>";
                            echo "<td>".$size."</td>";
                            echo "<td>".$address."</td>";
                            echo "<td>".$time."</td>";
                            echo "<td>".$info."</td>";
                            echo "</tr>.";
                        }
                    ?>
                </table>
                <br>
                    <input type = 'button' onclick='history.back()' value='Go Back' class="btn clickable"></input>
            </div>
        </body>
    </center>
</html>

