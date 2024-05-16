<?php 

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/item.php');

$session = new Session();

if ($_SESSION['csrf'] !== $_POST['csrf']) {

    $session->addMessage('hacker','Tentativa de csrf');
    header('Location: ../pages/login.php');
    exit();
}


if(isset($_POST['add_button'])){
    $db = getDatabaseConnection();
    $countCategories = 'SELECT COUNT(*) as count FROM CATEGORIES';
    $stmt = $db->prepare($countCategories);
    $stmt->execute();
    $num = $stmt->fetch();

    $category_id = $num['count'] + 1;
    $new_category = $_POST['add_category'];

    $query = 'INSERT INTO CATEGORIES (id, name) VALUES (:id, :name)';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $category_id);
    $stmt->bindParam(':name', $new_category);
    $stmt->execute();

    header('Location: ../pages/menu.php');
    exit();

}

if(isset($_POST['delete_button'])){
    $db = getDatabaseConnection();
    $category = $_POST['category'];

    $query = 'DELETE FROM CATEGORIES WHERE name = :name';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $category);
    $stmt->execute();

    header('Location: ../pages/menu.php');
    exit();

}


?>
