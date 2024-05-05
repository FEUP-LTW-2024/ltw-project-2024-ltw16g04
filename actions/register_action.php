<?php
    
    include_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');

    $db = getDatabaseConnection();
    $email = $_POST['email'];
    
    //função que checa se o email já foi associado

    $query = 'SELECT * FROM Users WHERE email = ?';
    $stmt = $db->prepare($query);
    $stmt->execute(array($email));
    $user = $stmt->fetch();

    if($user){
        $session = new Session();
        $session->addMessage('error', 'O email já foi associado a uma conta.');
        header('Location: ../pages/register.php');
        exit();
    } else{
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $countUsers = 'SELECT COUNT(*) as count FROM Users';
        $stmt = $db->prepare($countUsers);
        $stmt->execute();
        $num = $stmt->fetch();
        $id = $num['count'] + 1;
        
        User::addUser($id, $name, $phone, $password, $email, $db);
        $session = new Session();
        $session->addMessage('success', 'Conta criada com sucesso.');
        header('Location: ../pages/login.php');
        exit();
    }
?>
