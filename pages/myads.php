<?php
  declare(strict_types = 1);

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../actions/top_bar.php');
  require_once(__DIR__ .'/../actions/footer.php');


  $session = new Session(); ?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>My orders</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/myads.css" rel="stylesheet">
    <link href="../CSS/topbar.css" rel="stylesheet">
    <link href="../CSS/footer.css" rel="stylesheet">
    <!-- fonts used  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- end here -->
  </head>
  <header class="header">
    <?php drawHeader(); ?>
  </header>
  <body id="order_body">
    <section class="orders_header">
      <div class= "orders_header_container">
        <p>Home / My Ads</p>
        <p>Here is your ads, <?php echo 
        $session->getName();
        ?>!</p>
      </div>  
    </section>
    <section class="account">
      <div class="container account_nav">
        <h1 class="profile_title">Manage My Account</h1>
        <div class="account_selector">
          <a href="profile.php" class="account_link">My Profile</a>
          <a href="order.php" class="account_link">My Orders</a>
          <a href="wishlist.php" class="account_link">My Wishlist</a>
          <a href="#" class="account_link">My Ads</a>
          <a href="login.php" class="account_link" id="logout">Log Out</a>
        </div>
      </div>
      <section class="ads">
        <div class="card">
          <div class="card_top">
            <img src="../images/items/gameController.png" alt="" class="card_img" />
            <button class="add_btn">Edit</button>
          </div>
          <div class="card_body">
            <h3 class="card_title">HAVIT HV-G92 Gamepad</h3>
            <p class="card_price">$120</p>
          </div>
        </div>
      </section>
    </section>
    <?php drawFooter(); ?>
  </body>
