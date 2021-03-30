<?php

    session_start();

    $lname = $_POST["lname"];
    $lpw = $_POST["lpw"];

//ＤＢに接続する

    try {
        $pdo = new PDO('mysql:dbname=animal_db; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }

//データ登録のSQL作成
    $sql="SELECT * FROM member_table WHERE u_name=:lname AND u_pw=:lpw";
    $stmt = $pdo->prepare($sql);
    $stmt ->bindValue(':lname',$lname);
    $stmt ->bindValue(':lpw',$lpw);
    $res = $stmt->execute();

    // SQI実行時にエラーがある場合
    if($res==false){
        $error = $stmt->errorInfo ();
        exit("QueryError:".$error[2]);
    }

//抽出データ数を取得

    $val = $stmt->fetch();

    if( $val["id"] != ""){
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["u_name"] = $val['u_name'];
        $_SESSION["rank_flg"] = $val['rank_flg'];
        $_SESSION["id"] = $val['id'];
        // ログイン処理OKの場合
        header("Location: _top.php");
    }else{
        // ログイン処理NGの場合
        header("Location: login_new.php");
    }

    ?>
