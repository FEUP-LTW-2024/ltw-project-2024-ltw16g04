<?php
    
    require_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');

    if (session_status() == PHP_SESSION_NONE){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start();
        if (!isset($_SESSION['csrf'])){
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
    }
    
    $session = new Session();

    
    $db = getDatabaseConnection();
    $user = User::checkUserWithPassword($_POST['email'], $_POST['password'],$db);
    
    if ($user){
        $session->setId($user->id_user);
        $session->setName($user->name);
        $session->setEmail($user->email);
        
        //fazer algo para aparecer isso
        $session->addMessage('success', 'Login efetuado com sucesso.');
        
        header('Location: ../pages/profile.php');
        
        exit();
    }
    else{
        $session->addMessage('error', 'O utilizador ou a palavra-passe estão errados.');
        header('Location: ../pages/login.php');
        exit();
    }
?>