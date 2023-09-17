<?php
// 相対パス
// require_once '../config/env.php';
// 絶対パス
require_once __DIR__ . '/../config/env.php';

try {
    $dbh = new PDO(DSN, DB_USER, DB_PASS,[
      // エラーモードを決める
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      // 配列をkeyとvalueで必ず返す
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $sql = "SELECT * FROM users";
    
    $stmt = $dbh->query($sql);
    foreach($stmt as $record){
      print_r($record);
    }
    echo "成功です";
} catch (PDOException $e) {
    $msg = $e->getMessage();
}