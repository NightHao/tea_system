# tea_system
台灣飲料店資料庫  
有三種資料表 分別為drink, drinkshop,brand  
在更新新增時，因為drinkshop的shopname和brand的shopname為primary key且參考drink，故請確認drink有此種shopname  
而drinkshop的brandname參考brand的primary key，但因drinkshop的brandname不為主鍵，故不一定需要有  
但若需要brandname，則務必確認在於brand中  
