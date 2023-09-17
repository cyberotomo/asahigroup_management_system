<html>
<head><title>PHP TEST</title></head>
<body>

<?php
require_once('config/config.php');

//データベースへ接続、テーブルがない場合は作成
try {
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("create table if not exists userData(
        id int not null auto_increment primary key,
        email varchar(255),
        password varchar(255),
        created timestamp not null default current_timestamp
      )");
  } catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }

 // レコード抽出
 $sql = "SELECT * FROM userData";
 $stmt = $pdo->query($sql);

 echo "<ul>";
 foreach($stmt as $row) {
     echo "<li>" . $row['email'] . "</li>";
 }
 echo "</ul>";

 $pdo = null;

?>
</body>
</html>