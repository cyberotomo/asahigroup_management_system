<?php
require_once '../config/env.php';

try {
    $dbh = new PDO(DSN, DB_USER, DB_PASS);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}