<?php
    
    require_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');

    
    $session = new Session();
    

    $db = getDatabaseConnection();
    $user = User::checkUserWithPassword($_POST['email'], $_POST['password'],$db);
    
    if ($user){
        $_SESSION['email'] = $user->email;
        $_SESSION['id'] = $user->id_user;

        $session->addMessage('success', 'Login efetuado com sucesso.');
        
        header('Location: ../pages/login.php');
        
        exit();
    }
    else{
        $session->addMessage('error', 'O utilizador ou a palavra-passe estão errados.');
        header('Location: ../pages/login.php');
        exit();
    }
?>