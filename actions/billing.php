<?php
    
    include_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    include_once(__DIR__ . '/../data/user.php');
    require_once(__DIR__ .'/../actions/favorites.php');
    require_once(__DIR__ .'/../data/item.php');

    $session = new Session();

    
    if(isset($_POST['place_order'])){
        $db = getDatabaseConnection();
        removeFavorite($session->getId(), $session->getItemId(), $db);
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

        //insert into orders
        
        $seller_id = Item::getSeller($item_id, $db);
        $item = Item::findItem($item_id, $db);
        //create order id
        $countOrders = 'SELECT COUNT(*) as count FROM Orders';
        $stmt = $db->prepare($countOrders);
        $stmt->execute();
        $num = $stmt->fetch();
        $order_id = $num['count'] + 1;
        $status = 'pending';
        $amount = $item->price;
        $query = 'INSERT INTO Orders (id,buyer_id,seller_id,item_id, amount,status) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $db->prepare($query);
        $stmt->execute(array($order_id,$user_id, $seller_id, $item_id, $amount,$status));
        
        header('Location: ../pages/profile.php');
        exit();
    }
    if(isset($_POST['go_back'])){
        $item_id = $session->getItemId();
        header('Location: ../pages/item.php?id='.$item_id);
        exit();
    }
?>
