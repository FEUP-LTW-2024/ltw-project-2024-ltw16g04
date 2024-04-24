<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../actions/top_bar.php');
  require_once(__DIR__ .'/../actions/footer.php');

?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Login</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/login.css" rel="stylesheet">
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
        <section class="login">
          <img src="../images/loginimage.jpeg" alt="">
          <div class="login-box">
            <h1 id="loginTitle">Enter your details below</h1>
            <form action="../actions/login_action.php" method="post">
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your e-mail" required>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" required>
                </div>
                <section id="messages">
			            <?php foreach ($session->getMessages() as $messsage) { ?>
				            <article class="<?=$messsage['type']?>">
				            <?=$messsage['text']?>
				            </article>
			            <?php } ?>
			          </section>
                <div class="loginbottom">
                  <button id="signin">Log In</button>
                <p id="forgot"><a href="forgot.php">Forgot Password?</a></p>
                </div>
            </form>
            <p id="noAccount">Don't have an account? <a href="register.php">Sign Up Now</a></p>
          </div>
        </section>
        <?php drawFooter(); ?>
    </body>