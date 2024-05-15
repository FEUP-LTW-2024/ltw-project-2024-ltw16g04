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
        removeFavorite($session->getId(), $session->getItemId(), $db);
        



        
        $user_id = $session->getId();


    
        $item_id = $session->getCheckoutItem();
        
    

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
        $name = $item->name;
        $query = 'INSERT INTO Orders (id,buyer_id,seller_id,item_id, item_name,amount,status) VALUES (?, ?, ?, ?, ? ,?, ?)';
        $stmt = $db->prepare($query);
        $stmt->execute(array($order_id,$user_id, $seller_id, $item_id, $name,$amount,$status));
        Item::deleteItem($item_id, $db);

        header('Location: ../pages/order.php');
        exit();
    }
    if(isset($_POST['go_back'])){
        $item_id = $session->getItemId();
        header('Location: ../pages/item.php?id='.$item_id);
        exit();
    }
?>
