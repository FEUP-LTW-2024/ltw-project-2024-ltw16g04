<?php

function addFavorite(){

    $session = new Session();

    if(!$session->isLoggedIn()) {
        $session->addMessage('error', 'Precisas de fazer login para adicionar favoritos.');
        header('Location: ../pages/login.php');
        exit();
    }

    $user_id = $session->getId();
    $item_id = $session->getItemId();

    $db = getDatabaseConnection();

    $hasFavorite = User::favoriteItem($user_id, $item_id, $db);

    if(!$hasFavorite){
    
        $query = 'INSERT INTO Favorites (user_id, item_id) VALUES (?, ?)';
        $stmt = $db->prepare($query);
        $stmt->execute(array($user_id, $item_id));
    }

    
}


function removeFavorite($user_id, $item_id, $db){

    $query = 'DELETE FROM Favorites WHERE user_id = ? AND item_id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id, $item_id));

}

?>

