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
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/forgot.css" rel="stylesheet">
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
        <section class="forgot">
          <img src="../images/loginimage.jpeg" alt="">
            <div class="forgot-box">
            <h1 id="createAccTitle">Forgot password? Reset here!</h1>
            <p id="forgot_text">We will send you an email with a link to reset your password, please enter the email associated with your account below.</p>
            <form action="../actions/forgot_action.php" method="post">
                <div class="email">
                    <label for="email">Your E-mail</label>
                    <input type="email" name="email" id="email" placeholder="e.g: johndoe@example.com" required>
                    <button id="forgotButton">Send Email</button>
                </div>
            </form>
            <section id="messages">
			            <?php foreach ($session->getMessages() as $messsage) { ?>
				            <article class="<?=$messsage['type']?>">
				            <?=$messsage['text']?>
				            </article>
			            <?php } ?>
			          </section>
            </div>
        </section>
        <?php drawFooter(); ?>
    </body>
