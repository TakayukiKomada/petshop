<?php
require_once __DIR__ . '/config.php';

// 接続処理を行う関数
function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

// エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function get_info()
{
    // データベースに接続
    $dbh = connect_db();

    // SQL文の組み立て
    $sql = 'SELECT * FROM animals';

    // プリペアドステートメントの準備
    // $dbh->query($sql) でも良い
    $stmt = $dbh->prepare($sql);

    // プリペアドステートメントの実行
    $stmt->execute();

    // 結果の受け取り
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $animals;
}
function select_animals($keyword)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
    *
    FROM
    animals
    WHERE
    description LIKE :keyword;
    EOM;

    $keyword_param = '%'.$keyword.'%';

    $stmt = $dbh->prepare($sql);

    $stmt ->bindValue(':keyword',$keyword_param,PDO::PARAM_STR);

    $stmt->execute();

    $select_animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $select_animals;
}
