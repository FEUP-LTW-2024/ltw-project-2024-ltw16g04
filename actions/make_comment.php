<script src="../js/script.js"></script>

<?php
    
    require_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');

    
    $session = new Session();
    

    $db = getDatabaseConnection();
    $item_id = $_POST['id'];

    $user_id = $session->getId();
    $user = User::getUser($user_id,$db);
    $comment = $_POST['comment'];
    //ver depois
    $created_at = date('Y-m-d H:i:s');
    $rating = $_POST['rating'];
    if(!$rating){
        $rating = 5;
    }
    if ($user){

        $commentId = 'SELECT COUNT(*) as count FROM Comments';
        $stmt = $db->prepare($commentId);
        $stmt->execute();
        $num = $stmt->fetch();
        $id = $num['count'] + 1;
        $query = 'INSERT INTO Comments(id, item_id, user_id, rating, comment, created_at) VALUES (?,?,?,?,?,?)';
        $stmt = $db->prepare($query);
        $stmt->execute(array($id, $item_id, $user_id, $rating, $comment, $created_at));
        $message = "Comentário adicionado com sucesso!";
        echo "<script>showAlert('$message');</script>";
    
    } else {
        $message = "Email não existe em nossa plataforma!";
        echo "<script>showAlert('$message');</script>";
    }

    header('Location: ../pages/item.php?id='.$item_id);
    exit();
?>