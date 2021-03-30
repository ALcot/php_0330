<?php

//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続
try {
  $pdo = new PDO('mysql:dbname=animal_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
$sql = 'DELETE FROM animal_table WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

if($status==false){
 
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //kusuri.phpへリダイレクト
  header("Location: animal.php");
  exit;

}


?>



