<?php
    
    include_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');

    $session = new Session();

    
    if(isset($_POST['place_order'])){
        $countBillings = 'SELECT COUNT(*) as count FROM Billing';
        $db = getDatabaseConnection();
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
        
        $checkoutItems = $session->getCheckoutItems();
        foreach($checkoutItems as $item_id) {
            $query = 'INSERT INTO BILLING_ITEMS (billing_id, item_id) VALUES (?, ?)';
            $stmt = $db->prepare($query);
            $stmt->execute(array($order_id, $item_id));
        }
            header('Location: ../pages/profile.php');
        exit();
    }
    if(isset($_POST['go_back'])){
        $item_id = $session->getItemId();
        header('Location: ../pages/item.php?id='.$item_id);
        exit();
    }
?>
