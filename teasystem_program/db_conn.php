<?php
    $user = 'root';//資料庫使用者名稱
    $password = 'pass';//資料庫的密碼
    try{ //連接資料庫
        $db = new PDO('mysql:host=localhost;dbname=teasystem;charset=utf8',$user,$password="2134wqsaxz");
        //之後若要結束與資料庫的連線，則使用「$db = null;」
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //設定想要新增的內容
        
        //設定要使用的SQL指令
        
    }catch(PDOException $e){//若上述程式碼出現錯誤，便會執行以下動作
        Print "ERROR!:". $e->getMessage();
        die();
    }
?>

















