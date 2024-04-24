<?php
    
    include_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');
    $session = new Session();
    $db = getDatabaseConnection();
    if(isset($_POST['save_changes'])){ 
    $email = $_SESSION['email'];
    $password = $_POST['cur_password'];
    
    $user = User::checkUserWithPassword($email, $password, $db);

    if($session->isLoggedIn()){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $new_password = $_POST['new_password'];
        $rep_password = $_POST['rep_password'];
        if($new_password == $rep_password){
            $query = 'UPDATE Users SET name = ?, address = ?, password = ? WHERE email = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($fname . ' ' . $lname, $address, $new_password, $email));
            $session->addMessage('success', 'Perfil atualizado com sucesso.');
            header('Location: ../pages/profile.php');
            exit();
        } else {
            $session->addMessage('error', 'As passwords não coincidem.');
            header('Location: ../pages/profile.php');
            exit();
        }
            
    }else {
        $session->addMessage('error', 'A password atual ou email está incorreta.');
        header('Location: ../pages/profile.php');
        exit();
    }
} 
    if(isset($_POST['cancel_button'])){
        header('Location: ../pages/profile.php');
        exit();
    }
        
    
?>
