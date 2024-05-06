<?php 

include_once(__DIR__ . '/../conf.php');
include_once(__DIR__ .'/../utils/session.php');
include_once(__DIR__ .'/../data/connection.php');

$session = new Session();


    $input = $_POST['input'];
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM Item WHERE name LIKE ?';
    $stmt = $db->prepare($query);
    $stmt->execute(array('%'.$input.'%'));    
    $items = $stmt->fetchAll();

    if(!$items){
        $session->addMessage('error', 'Nenhum item encontrado.');
        header('Location: ../pages/index.php');
        exit();
    } else {
        
        //fazer página que simula browse com resultados correntes
    }
?>