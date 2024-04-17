<?php
  declare(strict_types = 1);

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../actions/top_bar.php');
  require_once(__DIR__ .'/../actions/footer.php');

?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Profile</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/profile.css" rel="stylesheet">
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
  <body>
  <?php drawHeader(); ?>
        <section class="profile-header">
          <p>Home / My Account</p>
          <p>Welcome! UserExample</p>
        </section>
        <h1 class="profile-title">Manage My Account</h1>
        <section class= "edit-profile">
          <h1 class="profile-sub">Edit My Profile</h2>
          <form action="" method="post">
                <div class="name">
                    <label for="first-name">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="Your First Name">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="f=lname" id="lname" placeholder="Your Last Name">
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your e-mail">
                </div>
                <div class="address">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Your address">
                </div>
                <div class="password-change">
                  <label for="cur-password">Password Changes</label>
                  <input type="password" name="cur-password" id="cur-password" placeholder="Current password">
                </div>
            </form>
        </section>
        <?php drawFooter(); ?>
    </body>