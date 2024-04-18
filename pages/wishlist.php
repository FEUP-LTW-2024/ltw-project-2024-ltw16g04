<?php
  declare(strict_types = 1);

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../actions/top_bar.php');
  require_once(__DIR__ .'/../actions/footer.php');

?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Martech</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/wishlist.css" rel="stylesheet">
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
 <!-- Header -->
 <body>
 <?php drawHeader(); ?> 
<section class="section">
  <div class="container">

    <div class="section_header">
      <h3 class="section_title">Wishlist</h3> 
    </div>
    <div class="products">
      <div class="card">
        <div class="card_top">
          <img src="../images/items/gameController.png" alt="" class="card_img" />
          <button class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title">HAVIT HV-G92 Gamepad</h3>
          <p class="card_price">€12.90</p>
        </div>
      </div>
      <div class="card">
        <div class="card_top">
          <img src="../images/items/camera.png" alt="" class="card_img" />
          <button class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title">Canon 1200D + 18-55 + 16GB</h3>
          <p class="card_price">€99.90</p>
        </div>
      </div>
      <div class="card">
        <div class="card_top">
          <img src="../images/items/gameController.png" alt="" class="card_img" />
          <button class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title">HAVIT HV-G92 Gamepad</h3>
          <p class="card_price">$120</p>
        </div>
      </div>
      <div class="card">
        <div class="card_top">
          <img src="../images/items/gameController.png" alt="" class="card_img" />
          <button class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title">HAVIT HV-G92 Gamepad</h3>
          <p class="card_price">$120</p>
        </div>
      </div>
      <div class="card">
        <div class="card_top">
          <img src="../images/items/gameController.png" alt="" class="card_img" />
          <button class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title">HAVIT HV-G92 Gamepad</h3>
          <p class="card_price">$120</p>
        </div>
      </div>
      <div class="card">
        <div class="card_top">
          <img src="../images/items/gameController.png" alt="" class="card_img" />
          <button class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title">HAVIT HV-G92 Gamepad</h3>
          <p class="card_price">$120</p>
        </div>
      </div>
      <div class="card">
        <div class="card_top">
          <img src="../images/items/gameController.png" alt="" class="card_img" />
          <button class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title">HAVIT HV-G92 Gamepad</h3>
          <p class="card_price">$120</p>
        </div>
      </div>
      <div class="card">
        <div class="card_top">
          <img src="../images/items/gameController.png" alt="" class="card_img" />
          <button class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title">HAVIT HV-G92 Gamepad</h3>
          <p class="card_price">$120</p>
        </div>
      </div>
      </div>
      </div>
    </div>
</section>
<!--FOOTER-->
<footer class="footer">
<?php drawFooter(); ?> 
</footer>
  
</body>

</html>