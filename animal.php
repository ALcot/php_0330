<?php

session_start();
include("_function.php");
loginCheck();

// データの抽出

// DBに接続する
$pdo = db_connect();


//データ登録のSQL作成

    $stmt = $pdo->prepare("SELECT * FROM animal_table");

    // SQLの実行
    $status = $stmt->execute();



//データの表示
$view = "";
if($status==false){
    $error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]); 
} else {
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

           $view .='<div class="animal_box">';
           $view .='<p>';
           $view .='<img src="'.$result["img"].'">';
           $view .='</p>';
           $view .='<p>';
           $view .=$result["a_name"];
           $view .='</p>';
           $view .='<p>';
           $view .= "生き物の種類 :".$result["category"];
           $view .='</p>';
           $view .='<p>';
           $view .=  "生き物のかいせつ :".$result["kaisetu"];
           $view .='</p>';  
           $view .='</div>'; 
           $view .='<a href = "delete.php?id='.$result["id"].'"onclick="return confirm(¥"データを削除します。本当によろしいですか？¥")">';
           $view .="削除";
           $view .= '</a>';
    }
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
<img src="img/タイト.png" alt="ヘッダー">
</div>
    <div class="log">
        <p><?php echo h($_SESSION["u_name"]);?>さん<a href="logout.php" class="btn_logout">ログアウト</a></p>
        <a href="_top.php">さいしょのページに戻る</a>
      </div>
    <div class="formArea">

      <h1>みんながきろくした生き物のいちらんです。<br/>どんな生き物がいるのかな？</h1><hr>
    </div>
    </header>


    <main>
     <h2 class="formArea">生き物いちらん</h2>
    <p class="formArea"><a href="admin_form.php">→きみのしっている生き物をとうろくする←</a></p>
        <form method="post" action="_search.php">
          <p class="formArea">絞り込む </p>
          <div class="formArea"><p>

            <input type="radio" class="radio_input" name="category" value="ほにゅう類"><label class="radio_label">ほにゅう類</label>
            <input type="radio" class="radio_input" name="category" value="ちょう類"><label class="radio_label">ちょう類</label>
            <input type="radio" class="radio_input" name="category" value="ぎょ類"><label class="radio_label">ぎょ類</label>
            <input type="radio" class="radio_input" name="category" value="りょうせい類"><label class="radio_label">りょうせい類</label>
            <input type="radio" class="radio_input" name="category" value="その他"><label class="radio_label">その他</label>
            <input type="radio" class="radio_input" name="category" value="すべて" checked><label class="radio_label">すべて</label><br>


            </p></div>
          <p class="formArea"><input type="submit" class="form-Btn" value="しらべる" /></p> 
        </form> 
      <hr>
     <div>
     <?php echo ($view)?>

    </div>
    </main>
          <footer>
  	<p>© All rights reserved by makki.</p>
  </footer>
  </body>
</html>