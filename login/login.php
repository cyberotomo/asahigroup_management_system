<?php

require_once __DIR__ . '/../config/env.php';

session_start();
$mail = $_POST['email'];

try {
    $dbh = new PDO(DSN, DB_USER, DB_PASS);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM userData WHERE email = :email";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$member = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['password'], $member['password'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $msg = 'ログインしました。';
    $link = '<a href="home/management-home.html">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>