<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/style.css" />
    <title>お名前登録</title>
  </head>
  <body>

    <header>
<div class=title>
<img src="img/タイト.png" alt="ヘッダー">
</div>
    </header>

  <main>

    <h2>お名前登録</h2>
      <form method="post" action="login_insert.php">
        <div>
            <p><label for="">お名前<span class="required">必ず入力してください。</span><br><input type="text" name="u_name" required/></label></p>
            <p><label for="">ID<span class="required">必ず入力してください。</span><br><input type="text" name="u_id" required /></label></p>
            <p><label for="">パスワード<span class="required">必ず入力してください。<br><input type="password" name="u_pw" required /></label><br>
              <span style="font-size:12px;">英数字8文字以上20文字以下</span></p>
              <p><label for="">確認の為、もう一度パスワードを記入してください。<span class="required">必ず入力してください。</span><br><input type="password" name="u_pw_conf" required /></label><br>
              <span style="font-size:12px;">英数字8文字以上20文字以下</span></p>
        </div>
            <input type="submit" class="form-Btn" value="お名前登録する" />
        </form>

        <div>
          <a class="navbar-brand" href="login.php">ログイン画面へ戻る</a>
        </div>
        
    </main>
          <footer>
  	<p>© All rights reserved by makki.</p>
  </footer>
  </body>
</html>
