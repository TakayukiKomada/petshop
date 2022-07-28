<?php
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $keyword = filter_input(INPUT_GET, 'keyword');
    $search_info = get_info($keyword);
}

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
    <h2>本日のご紹介ペット!</h2>
    <form action="" method="get">キーワード:
        <input type="search" name="keyword" placeholder="キーワードの入力">
        <input type="submit" value="検索">
    </form>
    <ul>
        <?php foreach ($search_info as $animal) : ?>
            <?= h($animal['type'] . "の" . $animal['classification'] . "ちゃん")  ?><br>
            <?= h($animal['description'])  ?><br>
            <?= h($animal['birthday'] . "生まれ")  ?><br>
            <?= h("出身地" . " " . $animal['birthplace'])  ?>
            <hr>
        <?php endforeach; ?>
</body>

</html>
