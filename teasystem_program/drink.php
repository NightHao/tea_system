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
        <title>台灣茶系統</title>
    </head>
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
    <center>
    <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            
            <ul class="nav navbar-nav" >
                <li class="nav-item">
                    <a class="navbar-brand" href="index.html">
                        <img src="img/cuplogo.png" alt="Logo" style="width:40px;">
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit.html">編輯</a>
                </li>
            </ul>
        </nav>
        <div class='container-fluid' style= 'margin-top: 10px;'>
        <div class="col-md-4" style="text-align:right;">
            <p>關鍵字搜尋</p>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
        </div>
        <div class="container-fluid">
            <div class="row">
                <table class='block table col-lg'>
                    <thaed>
                        <tr>
                            <th class="font-weight-bolder">品牌名稱</th>
                            <th class="font-weight-bolder">商家名稱</th>
                            <th class="font-weight-bolder">飲料種類</th>
                            <th class="font-weight-bolder">飲料名稱</th>
                            <th class="font-weight-bolder">價錢</th>
                            <th class="font-weight-bolder">大小</th>
                            <th class="font-weight-bolder">地址</th>
                            <th class="font-weight-bolder">營業時間</th>
                            <th class="font-weight-bolder">備註</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
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
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <input type = 'button' onclick='history.back()' value='回首頁' class="btn clickable rounded-circle" style="position: fixed; bottom: 40px;left: 40px;"></input>
    </body>
    </center>
</html>

