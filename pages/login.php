<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ .'/../data/connection.php');


?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Login</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/login.css" rel="stylesheet">
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
    <header>
      <div class ="border-top"></div>
      <div id="menu-bar">
        <img src="../images/logo-removebg-preview.png" alt="Martech logo" class="logo">
        <h1><a href="index.html" class="website-name">MarTech</a></h1>
        <button id="buyButton">BUY</button>
        <button id="sellButton">SELL</button>

        <form action="/search" method="get" id="search-bar">
          <input type="text" name="q" id="searchInput" placeholder="What are you looking for?">
          <button type="submit" class="search-button">
            <img src="../images/search.png" alt="search engine" id="search-icon"></button>
        </form>
        <img src="../images/user.png" alt="profile icon" class="icon-bar">
        <img src="../images/heart.png" alt="favorites icon" class="icon-bar">
        <img src="../images/shopping-basket.png" alt="basket icon" class="icon-bar">
      </div>
    </header>
    <body>
        <section class="login">
          <img src="../images/loginimage.jpeg" alt="">
            <div class="login-box">
            <h1>Enter your details below</h1>
            <form action="../actions/login_action.php" method="post">
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your e-mail">
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password">
                </div>
                <section id="messages">
			            <?php foreach ($session->getMessages() as $messsage) { ?>
				            <article class="<?=$messsage['type']?>">
				            <?=$messsage['text']?>
				            </article>
			            <?php } ?>
			          </section>
                <button id="signin">Log In</button>
            </form>
            <div class="loginproblem">
              
              <p><a href="menu.html">Forgot Password?</a></p>
            </div>
            <p>Don't have an account? <a href="menu.html">Sign Up Now</a></p>
            </div>
        </section>
    </body>