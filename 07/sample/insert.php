<?php
//var_dump($_POST);
//    exit;
//入力チェック（エラーにならない,入れ方わからない。
//1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$naiyo = $_POST["naiyo"];

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(id, name, email, naiyo, indate )VALUES(NULL, :name,:email, :naiyo, sysdate())");
$stmt->bindValue(':name',$name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',$email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyo', $naiyo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;

}
?>