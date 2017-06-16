<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お店情報登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">登録お店一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
   
    <legend>お気に入りのお店を登録しよう</legend>
     <label>名前：<input type="text" name="shopname"></label><br>
     <label>カテゴリー：<input type="text" name="category"></label><br>
     <label>お気に入り度：<input type="text" name="star"></label><br>
     <input type="submit" value="送信">
     <input type="submit" value="お店一覧を見る" formaction="select.php">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
