<?php

require_once __DIR__ . '/../config/env.php';

try {
 
  $PDO = new PDO(DSN, DB_USER, DB_PASS); //PDOでMySQLのデータベースに接続
  $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
 
  //input.phpの値を取得
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['password'];
 
  $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"; // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく
  $stmt = $PDO->prepare($sql); //値が空のままSQL文をセット
  $params = array(':name' => $name, ':email' => $email, ':password' => $password); // 挿入する値を配列に格納
  $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
 
  // 登録内容確認・メッセージ
  echo "<p>名前: " . $name . "</p>";
  echo "<p>メールアドレス: " . $email . "</p>";
  echo "<p>パスワード: " . $password . "</p>";
  echo '<p>上記の内容をデータベースへ登録しました。</p>';
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>