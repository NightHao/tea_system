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
        <title>台灣茶系統首頁</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">

        </script>

    </head>
    
    <center>
        <body>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
                <ul class="nav navbar-nav" >
                    <li class="nav-item ">
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
            <div class="jumbotron text-center", id="bar">
                <h1>台灣手搖茶系統</h1>
                <p>喝......茶......</p> 
            </div>
			<div class="container-fluid">
				<h3>搜尋結果</h3>
                <table class='block table col-lg-8'>
			<?php
				header("Content-type:text/html;charset=utf-8");
				include "db_conn.php";
				$brandname = $_POST["brandname"];//
				$shopname = $_POST["shopname"];//
				$name = $_POST["drinkname"];//
				$isjoin=0;
				$type=0;
				if(isset($shopname) || isset($brandname) || isset($name) ){
					//brandname不為空
					if(strcmp($brandname,"全部")!=0){
						//brandname、shopname不為空
						if(!empty($shopname)){
							//brandname、shopname、name不為空(法1)
							if(!empty($name)){
								$isjoin = 1;
								$type=1;
								$query = ("select * from drink natural right outer join brand natural left join drinkshop where shopname=? AND name=? AND brandname=?");
								$stmt = $db->prepare($query);
								$stmt->execute(array($shopname,$name,$brandname));
								$error = $stmt->execute();
								$result = $stmt->fetchAll();
								col_select($type);
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
									echo "<tr>";
									brand_Row($brandname, $shopname);
									shop_Row($brandname, $shopname, $address, $time, $isjoin);
									name_Row($brandname, $shopname, $category, $name, $price, $size, $info, $isjoin);
									echo "</tr>.";
									}
							}
							//brandname、shopname不為空,name為空(法2)
							else{
								$isjoin = 1;
								$type=2;
								$query = ("select * from brand_drinkshop  where shopname=? AND brandname=?");
								$stmt = $db->prepare($query);
								$stmt->execute(array($shopname,$brandname));
								$error = $stmt->execute();
								$result = $stmt->fetchAll();
								col_select($type);
								for($i=0; $i < count($result); $i++){
									$brandname = $result[$i]['brandname'];
									$shopname = $result[$i]['shopname'];
									$address = $result[$i]['address'];
									$time = $result[$i]['time'];
									echo "<tr>";
									brand_Row($brandname, $shopname);
									shop_Row($brandname, $shopname, $address, $time, $isjoin);
									echo "</tr>.";
									}
							}
						}
						//brandname不為空,shopname為空
						else{
							//brandname、name不為空,shopname為空(法3)
							if(!empty($name)){
								$isjoin = 1;
								$type=3;
								$query = ("select * from brand_drink  where name=? AND brandname=?");
								$stmt = $db->prepare($query);
								$stmt->execute(array($name,$brandname));
								$error = $stmt->execute();
								$result = $stmt->fetchAll();
								col_select($type);
								for($i=0; $i < count($result); $i++){
									$brandname = $result[$i]['brandname'];
									$shopname = $result[$i]['shopname'];
									$category = $result[$i]['category'];
									$name = $result[$i]['name'];
									$price = $result[$i]['price'];
									$size = $result[$i]['size'];
									$info = $result[$i]['info'];
									echo "<tr>";
									brand_Row($brandname, $shopname);
									name_Row($brandname, $shopname, $category, $name, $price, $size, $info, $isjoin);
									echo "</tr>.";
									}
							}
							//brandname不為空,shopname、name為空(法4)
							else{
								$isjoin = 0;
								$type=4;
								$query = ("select * from brand where brandname=?");
								$stmt = $db->prepare($query);
								$stmt->execute(array($brandname));
								$error = $stmt->execute();
								$result = $stmt->fetchAll();
								col_select($type);
								
								for($i=0; $i < count($result); $i++){
									$brandname = $result[$i]['brandname'];
									$shopname = $result[$i]['shopname'];
									echo "<tr>";
									brand_Row($brandname, $shopname);
									echo "</tr>";
									}

							}
						}
					}
					//brandname是空的
					else if(!empty($shopname)){
						//shopname、name不為空,brandname為空(法5)
						if(!empty($name)){
							$isjoin = 1;
							$type=5;
							$query = ("select * from drink_drinkshop where shopname=? AND name=?");
							$stmt = $db->prepare($query);
							$stmt->execute(array($shopname,$name));
							$error = $stmt->execute();
							$result = $stmt->fetchAll();
							col_select($type);
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
								echo "<tr>";
								brand_Row($brandname, $shopname);
								shop_Row($brandname, $shopname, $address, $time, $isjoin);
								name_Row($brandname, $shopname, $category, $name, $price, $size, $info, $isjoin);
								echo "</tr>.";
								}
						}
						//shopname不為空,brandname、name為空(法6)
						else{
							$isjoin = 0;
							$type=6;
							$query = ("select * from drinkshop where shopname=?");
							$stmt = $db->prepare($query);
							$stmt->execute(array($shopname));
							$error = $stmt->execute();
							$result = $stmt->fetchAll();
							col_select($type);
							for($i=0; $i < count($result); $i++){
								$brandname = $result[$i]['brandname'];
								$shopname = $result[$i]['shopname'];
								$address = $result[$i]['address'];
								$time = $result[$i]['time'];
								echo "<tr>";
								shop_Row($brandname, $shopname, $address, $time, $isjoin);
								echo "</tr>.";
								}
						}
					}
					//name不為空,brandname、shopname為空(法7)
					else if(!empty($name)){
						$isjoin = 0;
						$type=7;
						$query = ("select * from drink where name=?");
						$stmt = $db->prepare($query);
						$stmt->execute(array($name));
						$error = $stmt->execute();
						$result = $stmt->fetchAll();
						col_select($type);
						for($i=0; $i < count($result); $i++){
							$shopname = $result[$i]['shopname'];
							$category = $result[$i]['category'];
							$name = $result[$i]['name'];
							$price = $result[$i]['price'];
							$size = $result[$i]['size'];
							$info = $result[$i]['info'];
							echo "<tr>";
							name_Row($brandname, $shopname, $category, $name, $price, $size, $info, $isjoin);
							echo "</tr>.";
							}
						
					}
					//brandname、shopname、name為空(法8)
					else{
						$isjoin=1;
						$type=8;
						$query = ("select * from drink natural left outer join brand natural join drinkshop");
						$stmt = $db->prepare($query);
						$error = $stmt->execute();
						$result = $stmt->fetchAll();
						col_select($type);
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
							echo "<tr>";
							brand_Row($brandname, $shopname);
							shop_Row($brandname, $shopname, $address, $time, $isjoin);
							name_Row($brandname, $shopname, $category, $name, $price, $size, $info, $isjoin);
							echo "</tr>.";
						}
					}
				echo "</tbody>
					</table>";
				}
				else{
						 echo "error"."\n";
				}

				function col_select($type){
					switch ($type){
						case 1://brandname、shopname、name不為空(法1)
							echo "<table class='block table'>
							<thaed>
									<tr>				
										<th class=\"font-weight-bolder\">品牌名稱</th>
										<th class=\"font-weight-bolder\">商家名稱</th>
										<th class=\"font-weight-bolder\">地址</th>
										<th class=\"font-weight-bolder\">營業時間</th>
										<th class=\"font-weight-bolder\">飲料種類</th>
										<th class=\"font-weight-bolder\">飲料名稱</th>
										<th class=\"font-weight-bolder\">價錢</th>
										<th class=\"font-weight-bolder\">大小</th>
										<th class=\"font-weight-bolder\">備註</th>
									</tr>
							</thead>";
							break;
						case 2://brandname、shopname不為空,name為空(法2)
							echo "<table class='block table'>
							<thaed>
									<tr>				
										<th class=\"font-weight-bolder\">品牌名稱</th>
										<th class=\"font-weight-bolder\">商家名稱</th>
										<th class=\"font-weight-bolder\">地址</th>
										<th class=\"font-weight-bolder\">營業時間</th>
									</tr>
							</thead>";
							break;
						case 3://brandname、name不為空,shopname為空(法3)
							echo "<table class='block table'>
							<thaed>
									<tr>				
										<th class=\"font-weight-bolder\">品牌名稱</th>
										<th class=\"font-weight-bolder\">商家名稱</th>
										<th class=\"font-weight-bolder\">飲料種類</th>
										<th class=\"font-weight-bolder\">飲料名稱</th>
										<th class=\"font-weight-bolder\">價錢</th>
										<th class=\"font-weight-bolder\">大小</th>
										<th class=\"font-weight-bolder\">備註</th>
									</tr>
							</thead>";
							break;
						case 4://brandname不為空,shopname、name為空(法4)
							echo "<table class='block table'>
							<thaed>
									<tr>				
										<th class=\"font-weight-bolder\">品牌名稱</th>
										<th class=\"font-weight-bolder\">商家名稱</th>
									</tr>
							</thead>";
							break;
						case 5://shopname、name不為空,brandname為空(法5)
							echo "<table class='block table'>
							<thaed>
									<tr>				
										<th class=\"font-weight-bolder\">品牌名稱</th>
										<th class=\"font-weight-bolder\">商家名稱</th>
										<th class=\"font-weight-bolder\">地址</th>
										<th class=\"font-weight-bolder\">營業時間</th>
										<th class=\"font-weight-bolder\">飲料種類</th>
										<th class=\"font-weight-bolder\">飲料名稱</th>
										<th class=\"font-weight-bolder\">價錢</th>
										<th class=\"font-weight-bolder\">大小</th>
										<th class=\"font-weight-bolder\">備註</th>
									</tr>
							</thead>";
							break;
						case 6://shopname不為空,brandname、name為空(法6)
							echo "<table class='block table'>
							<thaed>
									<tr>				
										<th class=\"font-weight-bolder\">品牌名稱</th>
										<th class=\"font-weight-bolder\">商家名稱</th>
										<th class=\"font-weight-bolder\">地址</th>
										<th class=\"font-weight-bolder\">營業時間</th>
									</tr>
							</thead>";
							break;
						case 7://name不為空,brandname、shopname為空(法7)
							echo "<table class='block table'>
							<thaed>
									<tr>				
										<th class=\"font-weight-bolder\">商家名稱</th>
										<th class=\"font-weight-bolder\">飲料種類</th>
										<th class=\"font-weight-bolder\">飲料名稱</th>
										<th class=\"font-weight-bolder\">價錢</th>
										<th class=\"font-weight-bolder\">大小</th>
										<th class=\"font-weight-bolder\">備註</th>
									</tr>
							</thead>";
							break;
						case 8://brandname、shopname、name為空(法8)
							echo "<table class='block table'>
							<thaed>
									<tr>				
										<th class=\"font-weight-bolder\">品牌名稱</th>
										<th class=\"font-weight-bolder\">商家名稱</th>
										<th class=\"font-weight-bolder\">地址</th>
										<th class=\"font-weight-bolder\">營業時間</th>
										<th class=\"font-weight-bolder\">飲料種類</th>
										<th class=\"font-weight-bolder\">飲料名稱</th>
										<th class=\"font-weight-bolder\">價錢</th>
										<th class=\"font-weight-bolder\">大小</th>
										<th class=\"font-weight-bolder\">備註</th>
									</tr>
							</thead>";
							break;
					}
					echo "<tbody id=\"myTable\">";
				}

				function brand_Row($brandname, $shopname){
					echo "<td>".$brandname."</td>";
					echo "<td>".$shopname."</td>";
				}

				function shop_Row($brandname, $shopname, $address, $time, $isjoin){
					if($isjoin == 0){
						echo "<td>".$brandname."</td>";
						echo "<td>".$shopname."</td>";			
					}
					echo "<td>".$address."</td>";
					echo "<td>".$time."</td>";
				}

				function name_Row($brandname, $shopname, $category, $name, $price, $size, $info, $isjoin){
					if($isjoin == 0){
					echo "<td>".$shopname."</td>";			
				}
				echo "<td>".$category."</td>";
				echo "<td>".$name."</td>";
				echo "<td>".$price."</td>";
				echo "<td>".$size."</td>";
				echo "<td>".$info."</td>";
				}
			?>
				</table>
			</div>
		<input type = 'button' onclick='history.back()' value='上一頁' class="btn clickable rounded-circle" style="position: fixed; bottom: 40px;left: 40px;"></input>

		</body>

	</center>
</html>