<?php

require_once __DIR__ . '/functions.php';

// データベースに接続
$dbh = connect_db();

// SQL文の組み立て
$sql = 'SELECT * FROM members';

// プリペアドステートメントの準備$dbhにデータベースの接続情報が入ってる。
// $dbh->query($sql) でも良い。今からSQLを実行しますという準備。
$stmt = $dbh->prepare($sql);

// プリペアドステートメントの実行
$stmt->execute();

// 結果の受け取りフェッチオールというメソッドを使うSQlを連想配列にしてくれる。カラム名をキーに指定した。
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - SELECT</title>
</head>

<body>
    <h2>データの抽出成功</h2>
    <ul>
        <?php foreach ($members as $member) : ?>
            <li><?= h($member['name']) . 'さん' ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
