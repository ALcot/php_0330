<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/style.css" />
    <title>きみのしっている生き物を登録しよう</title>
  </head>
  <body>

    <header>
<div class=title>
<img src="img/タイト.png" alt="ヘッダー">
</div>
    <h1 class=itiran><a href="animal.php">生き物いちらん</a></h1>
    </header>

  <main>
      <div class="formArea">
        <h2>生き物登録フォーム</h2>
          <form method="post" action="admin_insert.php" enctype="multipart/form-data">
            <div class="form">
            <fieldset>  
                <p><label>生き物のなまえ<br/><textarea type="text" name="a_name" cols="35" required placeholder="例）いぬ、ねこ　等"/></textarea></label></p>
                <hr>
                <p><label for="">生き物のしゅるい<br/><br/>
            　　　　<input type="radio" name="category" value="ほにゅう類"/>ほにゅう類</label>
              　　　<input type="radio" name="category" value="ちょう類"/>ちょう類
              　　　<input type="radio" name="category" value="ぎょ類"/>ぎょ類
              　　　<input type="radio" name="category" value="りょう類"/>りょうせい類
              　　　<input type="radio" name="category" value="その他"/>その他</p>
            <hr>
                <p><label>生き物のかいせつ<span class="required"></span><br><textarea type="text" name="kaisetu" rows="10" cols="50" placeholder="〇〇と鳴く。等"　></textarea></label></p>
            <hr>
                <label>がぞうをえらんでください。</label><br/><br/>
            <input type="file" name="img" accept="image/*">
            </fieldset>
            <br/>
            <input type="submit" class="form-Btn" value="そうしん" />
      </form>
    </main>
      <footer>
  	<p>© All rights reserved by makki.</p>
  </footer>
  </body>
</html>
