<?php
// エラーメッセージ
$err = [];

// バリデーション
// filterinputでformからPOST送信されたusernameデータを取得する

// ユーザーネームが空だったらfalseを返却する
if($username = filter_input(INPUT_POST, 'username')){
 $err[] = 'ユーザー名を記入してください';
}

// メールアドレスが空だったらfalseを返却する
if($email = filter_input(INPUT_POST, 'email')){
    $err[] = 'メールアドレスを記入してください';
}
// パスワードチェック（※正規表現にてチェック）
$password = filter_input(INPUT_POST, 'password');

if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$pasword)){
$err[] = 'パスワードは英数字8文字以上100文字以下にしてください';
}

if(count($err) === 0){
    // ユーザーを登録する処理

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録が完了画面</title>
</head>
<body>
    <!-- エラーの出力 -->
    <?php if (count($err) > 0 ): ?>
    <?php foreach ($err as $e): ?>
        <p><?php echo $e ?></p>
    <p>ユーザー登録が完了しました</p>
    <a href="./signup_form.php">戻る</a>
</body>
</html>