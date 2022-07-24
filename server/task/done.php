<?php

require_once __DIR__ . '/functions.php';

$id = filter_input(INPUT_GET, 'id');
$status = filter_input(INPUT_GET, 'status');

update_done_by_id($id, $status);



header('Location: index.php');
exit;
