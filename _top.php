<?php

session_start();
include("_function.php");
loginCheck();

$id = $_SESSION["id"];


// 1:DBに接続する（エラー処理の追加）
$pdo = db_connect();


//2：データ登録のSQL作成[選択]

  $stmt = $pdo->prepare("SELECT * FROM member_table WHERE id=:id");
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

  // SQLの実行
  $status = $stmt->execute();

// 3.データの表示
$view = "";
if($status==false){

  $error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]); 
} else {
  $val = $stmt->fetch();
  }





?>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>みんなでつくる生き物ずかん</title>
<link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <header>
<div class=title>
<img class=title src="img/タイト.png" alt="ヘッダー">
</div>

      <div>
        <p><a href="logout.php" class="btn_logout">ログアウト</a></p>
      </div>
    <div>

            <div>
              <p>こんにちは！</p>
              <h2><?php echo h($_SESSION["u_name"]);?>さん</h2>
            </div>

      <h1>みんなでつくる生き物ずかんとは・・・</h1>
      <p>きみがしっている生き物をとうろくして世界にひとつだけのずかんをつくろう！<br/>きみがとうろくした生き物は他の人もみれるよ！</p>
    </div>
    <hr>
    </header>
    <main>


      <div>
        <p>みんながきろくした生き物を見に行こう！</p>
        <a href="animal.php">生き物を見に行く</a>
      </div>

    </main>
          <footer>
  	<p>© All rights reserved by makki.</p>
  </footer>
  </body>
</html>