<?php
// 入力チェック（受信確認処理の追加）
// セットされていない　または空の場合はエラーを返す
    if(
    !isset($_POST["a_name"]) ||$_POST["a_name"] ==""||
    !isset($_POST["category"]) ||$_POST["category"] ==""||
    !isset($_POST["kaisetu"]) ||$_POST["kaisetu"] ==""
    ){
        exit('記入エラーです。<br/>項目をすべて記入してください。');
    }

    // echo $_POST["category"];

//POSTデータの取得

$a_name = $_POST["a_name"];
$category = $_POST["category"];
$kaisetu = $_POST["kaisetu"];

// 画像の処理
$tempfile = $_FILES['img']['tmp_name']; // 一時ファイル名
$filename = $_FILES['img']['name']; // 本来のファイル名
$upload_dir = './img/';


if (is_uploaded_file($tempfile)) {
    if ( move_uploaded_file($tempfile ,$upload_dir.$filename )) {
	echo $filename . "をアップロードしました。";
    } else {
        echo "ファイルをアップロードできません。";
    }
} else {
    echo "ファイルが選択されていません。";
} 

// DBに接続する

    try {
        $pdo = new PDO('mysql:dbname=animal_db; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }


//データ登録のSQL作成　
    $sql="INSERT INTO animal_table(id, a_name, category, kaisetu, img)
        VALUES( NULL,:a_name,:category,:kaisetu,:img)"; 
    
    $stmt = $pdo->prepare($sql);

    // bindValue関連付け
    $stmt->bindValue(':a_name', $a_name, PDO::PARAM_STR);
    $stmt->bindValue(':category',$category, PDO::PARAM_STR);
    $stmt->bindValue(':kaisetu',$kaisetu, PDO::PARAM_STR);
    $stmt->bindValue(':img',$upload_dir.$filename , PDO::PARAM_STR);


    // SQLの実行
    $status = $stmt->execute();


// データ登録処理後

    if($status==false){
        //SQL実行時にエラーがある場合
        $error=$stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }else{
        //5:index.phpへリダイレクト
        header("Location: animal.php");
        exit;
    }
?>