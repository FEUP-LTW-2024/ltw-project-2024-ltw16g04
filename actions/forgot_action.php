<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
require_once(__DIR__ .'/../data/user.php');

$session = new Session();

$email = $_POST['email'];

$db = getDatabaseConnection();
$user = User::checkUserWithEmail($email, $db);

if($user){
    $session->addMessage('success', 'Email enviado com sucesso.');
    header('Location: ../pages/login.php');
    exit();
} else{
    $session->addMessage('error', 'O email não está associado a nenhuma conta.');
    header('Location: ../pages/forgot.php');
    exit();
}

?>