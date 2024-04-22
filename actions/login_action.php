<?php
    
    require_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');

    
    $session = new Session();
    

    $db = getDatabaseConnection();
    $user = User::checkUserWithPassword($_POST['email'], $_POST['password'],$db);
    
    if ($user){
        $session->setId($user->id_user);
        $session->setName($user->name);
        $session->setEmail($user->email);
        $session->setPwd($user->password);
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