<?php

session_start();
include("_function.php");
loginCheck();

// データの抽出

// 選択した種類を取得

$selectcategory ='';
$selectcategory = $_POST["category"];


//DBに接続する
$pdo = db_connect();


//データ登録のSQL作成


    if($_POST['category']==='すべて'){
    $stmt = $pdo->prepare("SELECT * FROM animal_table");
    }else{
      $category = $_POST["category"];
    $stmt = $pdo->prepare("SELECT * FROM animal_table WHERE category = :selectcategory");
    $stmt ->bindValue(':selectcategory',$category);
    }


    //SQLの実行
    $status = $stmt->execute();



// if(radiobtnの値がすべてのとき)｛

// sql(where文なし)
// 実行

// ｝else if(radiobtnが全て以外のとき)｛

// $category=$_POST("category")
// sql（where文あり）
// bindvalue使う
// 実行

// ｝



// 3.データの表示
$view = "";
if($status==false){
    //execute (SQL実行時にErrorがある場合）
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
           $view .=  "生き物の解説 :".$result["kaisetu"];
           $view .='</p>';  
           $view .='</div>'; 
           $view .='<a href=delete.php>';
           $view .='動物の情報を削除';
           $view .='</a>';
    }
}

?>

<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>生き物図鑑</title>
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
  <header>
 <div class=title>
<img src="img/タイト.png" alt="ヘッダー">
</div>
  <div>
        <p class="loginPlace"><?php echo h($_SESSION["u_name"]);?> <span style="font-size:14px;">さん</span><a href="logout.php" class="btn_logout">ログアウト</a></p>
      </div>
    <div>
      <h1>生き物一覧</h1>
      <p>みんながきろくした生き物のいちらんです。どんな生き物がいるのかな？</p>
    </div>

    <a href="admin_form.php">→きみのしっている生き物をとうろくする←</a>

    </header>

    <main>

<hr>
     <div>
        <form class="searchArea" method="post" action="_search.php">
          <p>絞り込む </p>
          <div><p>


            <input type="radio" class="radio_input" name="category" value="ほにゅう類"><label class="radio_label">ほにゅう類</label>
            <input type="radio" class="radio_input" name="category" value="ちょう類"><label class="radio_label">ちょう類</label>
            <input type="radio" class="radio_input" name="category" value="ぎょ類"><label class="radio_label">ぎょ類</label>
            <input type="radio" class="radio_input" name="category" value="りょうせい類"><label class="radio_label">りょうせい類</label>
            <input type="radio" class="radio_input" name="category" value="その他"><label class="radio_label">その他</label>
            <input type="radio" class="radio_input" name="category" value="すべて" checked><label class="radio_label">すべて</label><br>


            </p>
          </div>
          <p><input type="submit" class="form-Btn" value="しらべる" /></p> 
        </form>
      </div>  
<?php echo "生き物の種類　:　".$selectcategory; ?><br/>
      <hr>
     <div>


    <tabel>
    <pd></pd>

    
    </tabel>
     <?php echo $view ?>
      </div>

    </main>
          <footer>
  	<p>© All rights reserved by makki.</p>
  </footer>
  </body>
</html>