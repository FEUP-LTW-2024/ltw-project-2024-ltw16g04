<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
require_once(__DIR__ .'/../data/user.php');
require_once(__DIR__ .'/../data/item.php');

$session = new Session();

if ($_SESSION['csrf'] !== $_POST['csrf']) {

    $session->addMessage('hacker','Tentativa de csrf');
    header('Location: ../pages/login.php');
    exit();
}

if(isset($_POST['delete_ad'])){
    $db = getDatabaseConnection();
    $item_id = $_POST['ad_id'];
    Item::deleteItem($item_id, $db);
    header('Location: ../pages/myads.php');
    exit();
}

if(isset($_POST['create_ad'])){
    $db = getDatabaseConnection();
    $item_id = $_POST['ad_id'];


     // Check if file was uploaded without errors
     if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            
        // Specify the directory where you want to store the uploaded images
        $uploadDir = "../images/items/";
        
        // Get the file name and extension
        $fileName = basename($_FILES["image"]["name"]);
        
        // Generate a unique filename to avoid conflicts
        $uniqueFileName = uniqid() . '_' . $fileName;
        
        // Specify the path where the file will be stored
        $main_image = $uploadDir . $uniqueFileName;
        
        // Move the uploaded file to the specified directory
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $main_image)){
            echo "The file ".$fileName. " has been uploaded.";
        } else{
            echo "Sorry, there was an error uploading your file.";
        }
    } else{
        echo "Error: No file uploaded.";
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $old_price = null;
    $category = $_POST['category'];
    $condition = $_POST['condition'];
    $location = $_POST['location'];
    
    $seller_id = $session->getId();

    Item::editItem($item_id, $name, $description, $price, $category, $condition, $location, $main_image, $seller_id, $db);
    header('Location: ../pages/myads.php');
    exit();
}

if(isset($_POST['go_back'])){
    header('Location: ../pages/myads.php');
    exit();
}


?>