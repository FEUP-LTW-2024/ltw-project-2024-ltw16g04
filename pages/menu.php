<?php
  declare(strict_types = 1);

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../templates/common_tpl.php');
  require_once(__DIR__ .'/../utils/session.php');
  require_once(__DIR__ .'/../templates/browse_tpl.php');
 


  $session = new Session;
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Martech</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/menu copy.css" rel="stylesheet">
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

 <header class="header">
  <div class="container header_container">
    <div class="header_filter">
      <a href="browse.php?category=Audio%2C%20Photo%20%26%20Video" class="header_filter_link">Audio, Photo & Video</a>
      <a href="browse.php?category=Components" class="header_filter_link">Components</a>
      <a href="browse.php?category=Computers" class="header_filter_link">Computers</a>
      <a href="browse.php?category=Consoles" class="header_filter_link">Consoles</a>
      <a href="browse.php?category=Peripheral%20Devices" class="header_filter_link">Peripheral Devices</a>
      <a href="browse.php?category=Smartphones" class="header_filter_link">Smartphones</a>
      <a href="browse.php?category=Tablets" class="header_filter_link">Tablets</a>
    </div>
    <img src="../images/add.jpeg" alt="" class="header_img"/>
  </div>
</header>
<section class="section">
  <div class="container">
    <div class="section_category">
      <p class="section_category_p">Other Categories</p>
    </div>
    <div class="section_header">
      <h3 class="section_title">Browse by Category</h3>
    </div>
    <div class="categories">
  <a href="browse.php?category=Cameras" class="category">
    <img src="../images/icons/camera.png" alt="" class="category_icon" />
    <p class="category_name">Cameras</p>
  </a>
  <a href="browse.php?category=Computers" class="category">
    <img src="../images/icons/computer.png" alt="" class="category_icon" />
    <p class="category_name">Computers</p>
  </a>
  <a href="browse.php?category=Gaming" class="category">
    <img src="../images/icons/gaming.png" alt="" class="category_icon" />
    <p class="category_name">Gaming</p>
  </a>
  <a href="browse.php?category=Headphones" class="category">
    <img src="../images/icons/headphone.png" alt="" class="category_icon" />
    <p class="category_name">Headphones</p>
  </a>
  <a href="browse.php?category=Watches" class="category">
    <img src="../images/icons/watch.png" alt="" class="category_icon" />
    <p class="category_name">Watches</p>
  </a>
</div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section_category">
      <p class="section_category_p">Our Products</p>
    </div>
    <div class="section_header">
      <h3 class="section_title">Explore Our Products</h3> 
    </div>
    <div class="products">
      <?php 
        $items = getItems([]);
        drawItems($items);
        ?>
    </div>
      <div class="container_btn">
        <a href="../pages/browse.php" class="container_btn_a">VIEW ALL PRODUCTS</a>
      </div>
      <div class="separate"></div>
  </div>
</section>

<?php drawFooter(); ?>
</body>

</html>

