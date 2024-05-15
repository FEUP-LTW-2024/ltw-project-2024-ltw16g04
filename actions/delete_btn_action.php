<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/item.php');


$item_id = $_GET['id'];
$db = getDatabaseConnection();

Item::deleteItem($db, $item_id);

header('Location: ../pages/reportad.php');
exit();

?>

