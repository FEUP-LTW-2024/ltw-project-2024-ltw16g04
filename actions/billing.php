<?php
    
    include_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');
    require_once(__DIR__ .'/../actions/favorites.php');
    require_once(__DIR__ .'/../data/item.php');

    $session = new Session();

    if ($_SESSION['csrf'] !== $_POST['csrf']) {

        $session->addMessage('hacker','Tentativa de csrf');
        header('Location: ../pages/login.php');
        exit();
    }
    
    if(isset($_POST['place_order'])){
        $db = getDatabaseConnection();
        $countBillings = 'SELECT COUNT(*) as count FROM Billing';
        $stmt = $db->prepare($countBillings);
        $stmt->execute();
        $num = $stmt->fetch();
        $order_id = $num['count'] + 1;



        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $apartment = $_POST['apartment'];
        $city = $_POST['city'];
        $user_id = $session->getId();


        $db = getDatabaseConnection();
        $query = 'INSERT INTO Billing (id,user_id, first_name, last_name,street, apartment, city, email, phone) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $db->prepare($query);
        $stmt->execute(array($order_id,$user_id, $fname, $lname, $address, $apartment, $city, $email, $phone));
        
        $item_id = $session->getCheckoutItem();
        
        $query = 'INSERT INTO BILLING_ITEMS (billing_id, item_id) VALUES (?, ?)';
        $stmt = $db->prepare($query);
        $stmt->execute(array($order_id, $item_id));

       
        
        header('Location: ../pages/payment.php');
        exit();
    }
    if(isset($_POST['go_back'])){
        $item_id = $session->getItemId();
        header('Location: ../pages/item.php?id='.$item_id);
        exit();
    }
?>
