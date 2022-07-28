<?php
require_once __DIR__ . '/functions.php';

$get_info = get_info();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet</title>
</head>

<body>
    <h2>本日のご紹介ペット！</h2>
    <ul>
        <?php foreach ($get_info as $animal) : ?>
            <?= h($animal['type'] . "の" . $animal['classification'] . "ちゃん")  ?><br>
            <?= h($animal['description'])  ?><br>
            <?= h($animal['birthday'] . "生まれ")  ?><br>
            <?= h("出身地" . " " . $animal['birthplace'])  ?>
            <hr>
        <?php endforeach; ?>
</body>

</html>
