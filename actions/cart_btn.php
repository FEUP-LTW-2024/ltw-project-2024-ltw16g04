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

$item_id = $session->getItemId();
$session->setCheckoutItem($item_id);

header('Location: ../pages/checkout.php');
exit();

?>