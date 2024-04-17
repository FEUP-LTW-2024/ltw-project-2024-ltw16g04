<?php
    
    require_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');

    
    $session = new Session();
    

    $db = getDatabaseConnection();
    $item_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    //ver depois
    $created_at = date('Y-m-d H:i:s');
    $rating = 2;
    $user = User::checkUserWithEmail($email,$db);

    if ($user){

        $commentId = 'SELECT COUNT(*) as count FROM Comments';
        $stmt = $db->prepare($commentId);
        $stmt->execute();
        $num = $stmt->fetch();
        $id = $num['count'] + 1;
        $query = 'INSERT INTO Comments(id, item_id, user_id, rating, comment, created_at) VALUES (?,?,?,?,?,?)';
        $stmt = $db->prepare($query);
        $stmt->execute(array($id, $item_id, $user->id_user, $rating, $comment, $created_at));
        $session->addMessage('success', 'Comentário adicionado com sucesso.');
    
    } else {
        $session->addMessage('error', 'O utilizador não existe.');
    }

    header('Location: ../pages/item.php?id='.$item_id);
    exit();
?>