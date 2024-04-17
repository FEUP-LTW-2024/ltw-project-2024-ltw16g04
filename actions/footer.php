<?php

include_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');

function drawFooter(){



?>
<footer class="footer">
  <div class="footer__addr">


    <h1 class="footer__logo">
      MarTech</h1>

      <h2>Contact</h2>

      <address>
        5534 Somewhere In. The World 22193-10212<br>
            
        <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
      </address>
        
    
  </div>
  
  <ul class="footer__nav">
    <li class="nav__item">
      <h2 class="nav__title">Account</h2>

      <ul class="nav__ul">
        <li>
          <a href="#">My Account</a>
        </li>

        <li>
          <a href="#">Login / Register</a>
        </li>
            
        <li>
          <a href="#">Cart</a>
        </li>

        <li>
          <a href="#">Wishlist</a>
        </li>

        <li>
          <a href="#">Shop</a>
        </li>
      </ul>
    </li>
    
    <li class="nav__item">
      <h2 class="nav__title">Quick Link</h2>
      
      <ul class="nav__ul">
        <li>
          <a href="#">Privacy Policy</a>
        </li>
        
        <li>
          <a href="#">Terms Of Use</a>
        </li>
        
        <li>
          <a href="#">FAQ</a>
        </li>
        
      </ul>
    </li>
    
  </ul>
  
  <div class="legal">
    <p>&copy; Copyrigth FEUP\LTW 2024. All rights reserved.</p>
  </div>
</footer>
<?php 
}
?>