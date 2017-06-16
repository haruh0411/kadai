<?php
//1.POSTでParamを取得
$id = $_POST["id"];
$name = $_POST["shopname"];
$email = $_POST["category"];
$naiyo = $_POST["star"];
var_dump($_POST);

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3.UPDATE gs_an_table SET ....; で更新(bindValue)

$update = $pdo->prepare("UPDATE eat_clip SET shopname=:shopname, category=:category, star=:star
WHERE id=:id");


$update ->bindValue(':shopname', $name, PDO::PARAM_STR);
$update ->bindValue(':category', $email , PDO::PARAM_STR);
$update ->bindValue(':star', $naiyo , PDO::PARAM_STR);
$update ->bindValue(':id', $id , PDO::PARAM_INT);
$status = $update->execute();

//基本的にinsert.phpの処理の流れです。
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
//次のページリダイレクト
header("Location:select.php");
exit;

}

?>