<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
require_once(__DIR__ .'/../templates/common_tpl.php');



$session = new Session();
  if(!$session->isLoggedIn()) {header('Location: ../pages/login.php');
  exit();}



?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>FAQ</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/faq.css" rel="stylesheet">
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
    <h1>Frequently Asked Questions</h1>

    <div class="faq-item">
      <input type="checkbox" id="faq1" class="faq-toggle">
      <label for="faq1" class="question">How can I sell my electronic device on your platform?</label>
      <div class="answer">
        <p>To sell your electronic device, you can create a free account on our platform and then proceed to list your device for sale. Follow the instructions provided on the listing page to upload photos and add details about your device.</p>
      </div>
    </div>

    <div class="faq-item">
      <input type="checkbox" id="faq2" class="faq-toggle">
      <label for="faq2" class="question">Do you offer delivery services for purchased devices?</label>
      <div class="answer">
        <p>Yes, we offer delivery services for purchased devices. You can choose from our available shipping options during the checkout process.</p>
      </div>
    </div>

    <div class="faq-item">
      <input type="checkbox" id="faq3" class="faq-toggle">
      <label for="faq3" class="question">What payment methods are accepted for purchasing devices?</label>
      <div class="answer">
        <p>We accept major credit cards and bank transfers as payment methods for purchasing devices on our platform.</p>
      </div>
    </div>

    <div class="faq-item">
      <input type="checkbox" id="faq4" class="faq-toggle">
      <label for="faq4" class="question">How can I contact customer support for assistance?</label>
      <div class="answer">
        <p>You can contact our customer support team by emailing martech@admin.com.</p>
      </div>
    </div>

    <div class="faq-item">
      <input type="checkbox" id="faq5" class="faq-toggle">
      <label for="faq5" class="question">Can I report an ad?</label>
      <div class="answer">
        <p>Yes, you can report an ad if you find it violating our policies or containing inappropriate content. There is usually a "Report Ad" button available on the ad page for this purpose.</p>
      </div>
    </div>

    <div class="faq-item">
      <input type="checkbox" id="faq6" class="faq-toggle">
      <label for="faq6" class="question">Can I sell a scratched item?</label>
      <div class="answer">
        <p>Yes, you can sell a scratched item, but it's important to inform potential buyers about the scratches or any other defects. Providing accurate information about the condition of the item helps maintain trust between buyers and sellers.</p>
      </div>
    </div>

    <div class="faq-item">
      <input type="checkbox" id="faq7" class="faq-toggle">
      <label for="faq7" class="question">Do you offer warranty for purchased devices?</label>
      <div class="answer">
        <p>Yes, we offer a warranty for purchased devices. The duration and terms of the warranty may vary depending on the type of device and its condition. Please refer to the product listing or contact our customer support for more information.</p>
      </div>
    </div>

    <div class="faq-item">
      <input type="checkbox" id="faq8" class="faq-toggle">
      <label for="faq8" class="question">Can I return a device if I'm not satisfied with it?</label>
      <div class="answer">
        <p>Yes, you can return a device within a specified return period if you're not satisfied with it. Please review our return policy for details on eligibility, return conditions, and procedures.</p>
      </div>
    </div>

    <div class="faq-item">
      <input type="checkbox" id="faq9" class="faq-toggle">
      <label for="faq9" class="question">Are the devices on your platform brand new or used?</label>
      <div class="answer">
        <p>We offer both brand new and used devices on our platform. Each product listing specifies whether the device is new or used, along with its condition.</p>
      </div>
    </div>
  </div>
</section>
 <!--FOOTER-->

  <?php drawFooter(); ?>
  
</body>

</html>