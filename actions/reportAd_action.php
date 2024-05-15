<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
require_once(__DIR__ .'/../data/user.php');
require_once(__DIR__ .'/../data/item.php');

$session = new Session();

 if(isset($_POST['report_ad'])){

    $item_id = $_POST['item_id'];
    $description = $_POST['description'];

    $db = getDatabaseConnection();
    $count_reports = 'SELECT COUNT(*) as count FROM REPORT_ITEM';
    $stmt = $db->prepare($count_reports);
    $stmt->execute();
    $num = $stmt->fetch();
    $report_id = $num['count'] + 1;


    $query = 'INSERT INTO REPORT_ITEM (id, item_id, description) VALUES (?, ?, ?)';
    $stmt = $db->prepare($query);
    $stmt->execute(array($report_id,$item_id, $description));

    header('Location:../pages/menu.php');
    exit();

 }


if(isset($_POST['go_back'])){
    $item_id = $session->getItemId();
    header('Location: ../pages/item.php?id='.$item_id);
    exit();
}


?>