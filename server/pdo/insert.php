<?php

require_once __DIR__ . '/functions.php';

$dbh = connect_db();

$sql = <<<EOM
DELETE FROM
    members
WHERE
    id = :id
EOM;

$stmt = $dbh->prepare($sql);

$id = 1;

$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$stmt->execute();

// データの抽出
$sql2 = 'SELECT * FROM members';
$stmt = $dbh->prepare($sql2);
$stmt->execute();
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - DELETE</title>
</head>

<body>
    <h2>データの削除成功</h2>
    <ul>
        <?php foreach ($members as $member) : ?>
            <li><?= h($member['name']) . 'さん' ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
