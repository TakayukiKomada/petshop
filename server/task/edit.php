<?php
require_once __DIR__ . '/functions.php';

// index.php から渡された id を受け取る
$id = filter_input(INPUT_GET, 'id');

// 受け取った id のレコードを取得
$task = find_by_id($id);
?>
<!DOCTYPE html>
<html lang="ja">
<?php include_once __DIR__ . '/_head.html' ?>
<body>
    <div class="wrapper">
        <header class="header-task">
            <h1><a href="index.php">My Tasks</a></h1>
        </header>
        <h2 class="update-task-title">タスクの更新</h2>
        <div class="update-task task-form-group">
            <!-- エラーが発生した場合、エラーメッセージを出力 -->
            <ul class="errors">
                <li>タスク名を入力してください</li>
            </ul>
            <form action="" method="post">
                <input type="text" name="title" value="<?= h($task['title']) ?>">
                <div class="update-btn-group">
                    <button type="submit" class="big-btn update-btn">
                        <span>Update</span>
                        <i class="fa-solid big-icon fa-arrow-rotate-right"></i>
                    </button>
                    <a href="index.php" class="big-btn return-btn">
                        <span>Return</span>
                        <i class="fa-solid big-icon fa-arrow-rotate-left"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
