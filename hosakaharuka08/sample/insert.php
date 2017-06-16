<?php
//var_dump($_POST);
//    exit;
//入力チェック（エラーにならない,入れ方わからない。
//1. POSTデータ取得
$name = $_POST["shopname"];
$category = $_POST["category"];
$star = $_POST["star"];

//$naiyo = $_POST["naiyo"];

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    }
catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO eat_clip(id, shopname, category, star)VALUES(NULL, :shopname, :category, :star)");
$stmt->bindValue(':shopname', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category', $category, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':star', $star, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':naiyo', $naiyo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: kadai07.php");
  exit;

}
?>
