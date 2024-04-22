<?php 

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');

$session = new Session();

if(!$session->isLoggedIn()) {
    $session->addMessage('error', 'Precisas de fazer login para adicionar favoritos.');
    header('Location: ../pages/login.php');
    exit();
}

$user_id = $session->getId();
$item_id = $session->getItemId();

$db = getDatabaseConnection();
$query = 'INSERT INTO Favorites (user_id, item_id) VALUES (?, ?)';
$stmt = $db->prepare($query);
$stmt->execute(array($user_id, $item_id));

header('Location: ../pages/item.php?id='.$item_id);
exit();

?>