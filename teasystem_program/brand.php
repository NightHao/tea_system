<?php
    header("Content-type:text/html;charset=utf-8");
    include "db_conn.php";
    

    $brandname = "";
    $query = ("select brandname from brand group by brandname");
    $stmt = $db->prepare($query);
    $error = $stmt->execute();
    $result = $stmt->fetchAll();
    
    for($i=0; $i < count($result); $i++){
        echo "<tr>";
        echo "<option>".$result[$i]['brandname']."</option>";
        // echo "<td>".$result[$i]['count_shop']."</td>";
        echo "</tr>";
    }
	 
	 
echo "</table>";

    echo "<table border='1'>
    <tr>
    <th>店名</th>
    <th>地址</th>
    </tr>";

    $brandname = "";
    $query = ("select shopname,address from drinkshop where brandname = '50嵐' ");
    $stmt = $db->prepare($query);
    $error = $stmt->execute();
    $result = $stmt->fetchAll();
    
    for($i=0; $i < count($result); $i++){
    echo "<tr>";
    echo "<td>".$result[$i]['shopname']."</td>";
    echo "<td>".$result[$i]['address']."</td>";
    echo "</tr>.";
    }
	 
	 
echo "</table>";

    echo "<table border='1'>
    <tr>
    <th>店名</th>
    <th>地址</th>
    </tr>";

    $brandname = "";
    $query = ("select shopname,address from drinkshop where brandname = 'YK' ");
    $stmt = $db->prepare($query);
    $error = $stmt->execute();
    $result = $stmt->fetchAll();
    
    for($i=0; $i < count($result); $i++){
    echo "<tr>";
    echo "<td>".$result[$i]['shopname']."</td>";
    echo "<td>".$result[$i]['address']."</td>";
    echo "</tr>.";
    }
	
	
echo "</table>";

echo "</table>";

    echo "<table border='1'>
    <tr>
    <th>店名</th>
    <th>地址</th>
    </tr>";

    $brandname = "";
    $query = ("select shopname,address from drinkshop where brandname = '珍煮丹' ");
    $stmt = $db->prepare($query);
    $error = $stmt->execute();
    $result = $stmt->fetchAll();
    
    for($i=0; $i < count($result); $i++){
    echo "<tr>";
    echo "<td>".$result[$i]['shopname']."</td>";
    echo "<td>".$result[$i]['address']."</td>";
    echo "</tr>.";
    }
	
	
echo "</table>";
echo "<br><input type = 'button' onclick='history.back()' value='Go Back'></input>"
?>