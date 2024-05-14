<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
require_once(__DIR__ .'/../data/user.php');


$session = new Session();
  if(!$session->isLoggedIn()) {header('Location: ../pages/login.php');
  exit();}

  $db = getDatabaseConnection();
  $user = User::getUser($session->getId(), getDatabaseConnection());
  $name = $user->name;
  $user_id = $session->getId(); 

  $query = 'SELECT * FROM Orders WHERE seller_id = ?';
  $stmt = $db->prepare($query);
  $stmt->execute(array($user_id));
  $orders = $stmt->fetchAll(); 
  
    
        foreach ($orders as $order){
          $item_id = $order['item_id'];
          $query = 'SELECT * FROM Items WHERE id = ?';
          $stmt = $db->prepare($query);
          $stmt->execute(array($item_id));
          $item = $stmt->fetch();
          $item_name = $item['name'];
          $price = $order['amount'];
          $created_at = $order['created_at'];
          $seller_id = $order['seller_id'];
          $buyer_id = $order['buyer_id'];
          $query = 'SELECT * FROM Users WHERE id = ?';
          $stmt = $db->prepare($query);
          $stmt->execute(array($buyer_id));

          $buyer = $stmt->fetch();
          $buyer_name = $buyer['name'];

          $query = 'SELECT * FROM Billing WHERE user_id = ?';
          $stmt = $db->prepare($query);
          $stmt->execute(array($buyer_id));

            $billing = $stmt->fetch();
            $first_name = $billing['first_name'];
            $street = $billing['street'];
            $apartment = $billing['apartment'];
            $city = $billing['city'];
        }


  
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Martech</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/shippingform.css" rel="stylesheet">
    <!-- fonts used  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- end here -->
  </head>
 <!-- Header -->
 <body>
  

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Form</title>
    <link rel="stylesheet" href="../CSS/shippingform.css">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Label</title>
    <link rel="stylesheet" href="../CSS/shippingform.css">
</head>
<body>
    <div class="shipping-label">
        <div class="logo">
            <img src="../images/logo-removebg-preview.png" alt="Martech logo" width="75px">
            <span class="company-name">MarTech</span>
        </div>
        <div class="address">
            <p><?php echo $buyer_name; ?></p>
            <p><?php echo $street;?>, AP: <?php echo $apartment; ?></p>
            <p><?php echo $city; ?></p>
        </div>
        <div class="item">
            <h3>Item Information</h2>
            <p>Price: €<?php echo $price; ?> </p>
            <p>Weight: 1.5 lbs</p>
            <p>From: <?php echo $name; ?></p>
            <p>Shipped: <?php echo $created_at; ?></p>
        </div>
        <div class="barcode">
            <!-- Barcode image or text goes here -->
            <img src="../images/barcode.png" alt="Barcode" width="300px">
        </div>
    </div>
</body>
</html>

  
</body>

</html>