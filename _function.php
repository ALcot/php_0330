<?php

// XSS対策

    function h($val){
        return htmlspecialchars($val, ENT_QUOTES);
    }

 // ログイン認証チェック
    function loginCheck(){
        if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){
            echo "LOGIN Error!";
            exit();
        }else{
            //  認証できてる時　
            session_regenerate_id(true);
            $_SESSION["chk_ssid"] = session_id();
            
        }
    }

//DBに接続する（エラー処理の追加）
    function db_connect(){
    try {
        $pdo = new PDO('mysql:dbname=animal_db; charset=utf8; host=localhost','root','');
    }catch (PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }
        return $pdo;
    }


?>