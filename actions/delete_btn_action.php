<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/item.php');


$item_id = $_GET['id'];
$db = getDatabaseConnection();

Item::deleteItem($item_id, $db);

$query = 'DELETE FROM REPORT_ITEM WHERE item_id = ?';
$stmt = $db->prepare($query);
$stmt->execute(array($item_id));



header('Location: ../pages/reportedad.php');
exit();

?>

