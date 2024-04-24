<?php 
require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../data/connection.php');
require_once(__DIR__ . '/../data/user.php');
require_once(__DIR__ . '/../actions/browse_actions.php');
require_once(__DIR__ . '/../actions/top_bar.php');
require_once(__DIR__ . '/../actions/footer.php');


$session = new Session();


?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Martech</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/browse.css" rel="stylesheet">
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
  
<?php
  drawHeader();
?>
 


<section class="section">
  <div class="container">
    <div class="container filter_container">
        <p>Filters</p>
        <div class="header_filter">
          <a href="#" class="header_filter_link">Audio, Photo & Video</a>
          <a href="#" class="header_filter_link">Components</a>
          <a href="#" class="header_filter_link">Computers</a>
          <a href="#" class="header_filter_link">Consoles</a>
          <a href="#" class="header_filter_link">Peripheral Devices</a>
          <a href="#" class="header_filter_link">Smartphones</a>
          <a href="#" class="header_filter_link">Tablets</a>
        </div>

        <div class="header_filter">
            <label>
                <input type="checkbox" name="price" value="0-25">
                $0 - $25
                <span class="checkmark"></span>
              </label>
              <label>
                <input type="checkbox" name="price" value="25-59">
                $25 - $50
              </label>
              <label>
                <input type="checkbox" name="price" value="50-100">
                $50 - $100
              </label>
              <label>
                <input type="checkbox" name="price" value="100 >" id="100">
                $100 >
              </label>
          </div>

          <div class="header_filter">
            <label>
                <input type="checkbox" name="price" value="new">
                New
              </label>
              <label>
                <input type="checkbox" name="price" value="like_new">
                Like new
              </label>
              <label>
                <input type="checkbox" name="price" value="used">
                Used
              </label>
              <label>
                <input type="checkbox" name="price" value="fair">
                Fair
              </label>
              <label>
                <input type="checkbox" name="price" value="damaged">
                Damaged
              </label>
            </div>
        
  
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

<?php
  drawFooter();
  ?>
</body>

</html>