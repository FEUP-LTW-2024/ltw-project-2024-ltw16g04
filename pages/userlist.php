<?php
  declare(strict_types = 1);

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../templates/common_tpl.php');
  require_once(__DIR__ .'/../templates/userlist_tpl.php');
  require_once(__DIR__ .'/../utils/session.php');

  $session = new Session(); ?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Admin Actions</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/userlist.css" rel="stylesheet">
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
        <p>Home / User Lists</p>
        <p>Here is the list of all the users, <?php echo 
        $session->getName();
        ?>!</p>
      </div>  
    </section>
    <section class="account">
      
      <?php
      drawAccountNav();
      drawUserList();
      ?>
    </section>
    <?php drawFooter(); ?>
  </body>
