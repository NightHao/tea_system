<?php
    header("Content-type:text/html;charset=utf-8");
    include "db_conn.php";
    
    echo "<table border='1'>
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
    </tr>";

    $shopname = "";
    $query = ("select * from drink natural left outer join brand natural join drinkshop");
    $stmt = $db->prepare($query);
    $error = $stmt->execute();
    $result = $stmt->fetchAll();
    
    for($i=0; $i < count($result); $i++){
    echo "<tr>";
    echo "<td>".$result[$i]['brandname']."</td>";
    echo "<td>".$result[$i]['shopname']."</td>";
    echo "<td>".$result[$i]['category']."</td>";
    echo "<td>".$result[$i]['name']."</td>";
    echo "<td>".$result[$i]['price']."</td>";
    echo "<td>".$result[$i]['size']."</td>";
    echo "<td>".$result[$i]['address']."</td>";
    echo "<td>".$result[$i]['time']."</td>";
    echo "<td>".$result[$i]['info']."</td>";
    echo "</tr>.";
     }
echo "</table>";
echo "<br><input type = 'button' onclick='history.back()' value='Go Back'></input>"
?>