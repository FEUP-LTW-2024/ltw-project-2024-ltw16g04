<?php
  declare(strict_types = 1);

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../data/user.php');
  require_once(__DIR__ .'/../templates/common_tpl.php');
  require_once(__DIR__ .'/../utils/session.php');

  $session = new Session();
  if(!$session->isLoggedIn()) {header('Location: ../pages/login.php');
  exit();}
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
  
<header class="header">
  <?php drawHeader(); ?>
</header>
<body id= "profile_body">
  <section class="profile_header">
    <div class= "profile_header_container">
      <p>Home / My Account</p>
      <p>Welcome, <?php echo 
      $session->getName();  
      ?>!</p>
    </div>    
  </section>
  <section class="account">
    <?php drawAccountNav();
    
    $user = User::getUser($session->getId(), getDatabaseConnection());
    $phone = $user->phone;
    ?>  


    <section class= "edit_profile">
  
      <h1 class="profile_sub">Edit My Profile</h2>
      <form action="../actions/edit_profile_action.php" method="post">
            <div class="name">
              <div class="input_wrapper_name" id="input_fname">
                <label for="first-name">First Name</label>
                <input type="text" name="fname" id="fname" placeholder="Your First Name" value= <?php echo 
      $session->getName();  
      ?> required>
              </div>
              <div class="input_wrapper_name" id="input_lname">
                <label for="last-name">Last Name</label>
                <input type="text" name="f=lname" id="lname" placeholder="Your Last Name"required>
              </div>
            </div>
            <div class="email">
              <div class="input_wrapper_email" id="input_email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Your e-mail" value=<?php echo 
      $session->getEmail();  
      ?> required>
              </div>
              <div class="input_wrapper_email" class="phone">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" placeholder="e.g: +351 000-000-000" value=<?php echo $phone;?> required>
            </div>
              
            </div>
            <div id="input_address">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Your address" required>
              </div>
            <div class="password_change">
              <label for="cur-password">Password Changes</label>
              <input type="password" name="cur_password" id="cur_password" placeholder="Current password" required>
              <input type="password" name="new_password" id="new_password" placeholder="New password" required>
              <input type="password" name="rep_password" id="rep_password" placeholder="Repeat new password" required>
            </div>
            <div class="finish_edit_profile">
              <button id="save_changes" name = "save_changes">Save Changes</button>
            </div>
        </form>
    </section>
  </section>
  
        <?php drawFooter(); ?>
    </body>
  