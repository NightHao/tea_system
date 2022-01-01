# tea_system
台灣飲料店資料庫  
有三種資料表 分別為drink, drinkshop,brand  
新增時可輸入品牌名稱、商家名稱(必須)、飲料種類、飲料名稱、價錢、大小、地址、營業時間  
更新時輸入東西如上，並主要以(商家名稱&&飲料名稱)為基底作修改  
刪除時則輸入商家名稱或品牌名稱，會將與此有關的用cascade予此刪除  
將teasystem_program皆放在xampp/htdocs下即可使用  
teasystem.sql則打開phpadmin使用匯入讀取
