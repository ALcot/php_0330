<?php
// エラーメッセージを配列に入れる
    $err = [];

// 入力チェック（受信確認処理の追加）
// セットされていない　または空の場合はエラーを返す
    if(
    !isset($_POST["u_name"]) ||$_POST["u_name"] ==""||
    !isset($_POST["u_id"]) ||$_POST["u_id"] ==""||
    !isset($_POST["u_pw"]) ||$_POST["u_pw"] ==""
    ){
        $err[]='すべての項目を入力してください';
        exit('ParamError');
    }
// パスワードの正規表現 
    $u_pw = filter_input(INPUT_POST,'u_pw');
        if(!preg_match("/\A[a-z\d]{8,20}+\z/i",$u_pw)){
            $err[]='パスワードは英数字8文字以上20文字以下にしてください';
        }

 //バスワード　確認用と合ってるか？
    $u_pw_conf = filter_input(INPUT_POST,'u_pw_conf');
    if($u_pw !== $u_pw_conf){
        $err[]='パスワードが確認用パスワードと合ってません';
    }

 if (count($err)===0){
    // エラーがなければここからユーザーを登録する処理

//POSTデータの取得

$u_name = $_POST["u_name"];
$u_id = $_POST["u_id"];
$u_pw = $_POST["u_pw"];


//DBに接続する（エラー処理の追加）
    try {
        $pdo = new PDO('mysql:dbname=animal_db; charset=utf8; host=localhost','root','');
    }catch(PDOException $e){
        exit('DbConnectError:'.$e->getMessage());
    }

//データ登録のSQL作成　　:a1は変数が入れられないので置き換え用
    $sql="INSERT INTO member_table(id, u_name, u_id, u_pw, indate)
        VALUES( NULL,:a1,:a2,:a3,sysdate())"; 
    
    $stmt = $pdo->prepare($sql);


    // bindValue関連付け
    $stmt->bindValue(':a1', $u_name, PDO::PARAM_STR);
    $stmt->bindValue(':a2',$u_id, PDO::PARAM_STR);
    $stmt->bindValue(':a3',$u_pw, PDO::PARAM_STR);


    // SQLの実行
    $status = $stmt->execute();


//データ登録処理後

    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
        $error=$stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }
} 
?>

<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/form.css" />
    <title>メンバー登録</title>
  </head>
  <body>

    <header>
      <h1>生き物図鑑</h1>
    </header>
  <main>

    <h2>メンバー登録</h2>
        <?php if (count($err) >0) :?>
            <p class="red"><?php foreach($err as $em){
            echo $em."<br>";
            } ?>
            </p>
            <a href="login_new.php">メンバー登録へ戻る</a>
            
        <?php else: ?>
        <p class="red">メンバー登録が完了しました</p>
        <div>
          <a href="index.php">ログイン画面へ戻る</a>
        </div>
        <?php endif; ?>
    </main>
  </body>
</html>
