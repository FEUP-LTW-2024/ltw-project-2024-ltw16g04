<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
require_once(__DIR__ .'/../data/user.php');


$session = new Session();
  if(!$session->isLoggedIn()) {header('Location: ../pages/login.php');
  exit();}



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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="shipping-label">
        <div class="logo">
            <img src="../images/logo-removebg-preview.png" alt="Martech logo" width="75px">
            <span class="company-name">MarTech</span>
        </div>
        <div class="address">
            <p>John Doe</p>
            <p>123 Main Street</p>
            <p>City, State, ZIP Code</p>
            <p>Country</p>
        </div>
        <div class="item">
            <h3>Item Information</h2>
            <p>Item Name: Product XYZ</p>
            <p>Weight: 1.5 lbs</p>
            <p>From: John Doe</p>
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