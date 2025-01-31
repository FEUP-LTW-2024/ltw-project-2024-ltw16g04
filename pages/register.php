<?php
  declare(strict_types=1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../templates/common_tpl.php');
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/register.css" rel="stylesheet">
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
        <section class="register">
          <img src="../images/loginimage.jpeg" alt="">
            <div class="register-box">
            <h1 id="createAccTitle">Create an account</h1>
            <form action="../actions/register_action.php" method="post">
                <div class="name">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g: John Doe" required>
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="e.g: johndoe@example.com" required>
                </div>
                <section id="messages">
			            <?php foreach ($session->getMessages() as $messsage) { ?>
                  <?php if($messsage['type'] == 'double_user'){ ?>
                    <article class="<?=$messsage['type']?>">
                      <?=$messsage['text']?>
                      </article>
                  <?php } ?>
			          <?php } ?>
			          </section>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" required>
                </div>
                <div class="phone">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" id="phone" placeholder="e.g: +351 000-000-000" required>
                </div>
                <div class="address">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="e.g: Pink Street, 000" required>
                </div>
                <button id="registerButton">Register</button>
            </form>
            <span id="span">Already have an account? <a href="login.php">Sign In Now</a></span>
            </div>
        </section>
        <?php drawFooter(); ?>
    </body>
