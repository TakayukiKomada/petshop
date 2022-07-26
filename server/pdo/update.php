<?php

require_once __DIR__ . '/functions.php';

// データベースに接続
$dbh = connect_db();

// SQL文の組み立て
$sql = <<<EOM
UPDATE
    members
SET
    name = :name
WHERE
    id = :id
EOM;

// プリペアドステートメントの準備
$stmt = $dbh->prepare($sql);

// バインドするパラメータの準備(更新情報の準備)
$id = 1;
$name = 'tom Suzuki';

// パラメータのバインド

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// プリペアドステートメントの実行
$stmt->execute();

// SQL文の組み立て
$sql2 = 'SELECT * FROM members';

// プリペアドステートメントの準備
$stmt = $dbh->prepare($sql2);

// プリペアドステートメントの実行
$stmt->execute();

// 結果の受け取り
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - UPDATE</title>
</head>

<body>
    <h2>データの更新成功</h2>
    <ul>
        <?php foreach ($members as $member) : ?>
            <li><?= h($member['name']) . 'さん' ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
