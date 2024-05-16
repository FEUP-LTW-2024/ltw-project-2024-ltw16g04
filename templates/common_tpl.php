<?php 

function drawAccountNav(){
    
  require_once(__DIR__ . '/../data/user.php');
    ?>

    
    <div class="container account_nav">
        <div class="account_title">
        <h1 class="profile_title">Manage My Account</h1></div>
        <div class="account_selector">
          <a href="profile.php" class="account_link">My Profile</a>
          <a href="order.php" class="account_link">My Orders</a>
          <a href="wishlist.php" class="account_link">My Wishlist</a>
          <a href="myads.php" class="account_link">My Ads</a>
          <a href="solditems.php" class="account_link">My Sold Items</a>
          
          
          <?php 
          $session = new Session();
          $db = getDatabaseConnection();
          if(User::isAdmin($session->getId(), $db)){ ?>
          <div class="account_subtitle">
          <h3 class="action_subtitle">Admin Actions</h3></div>
          <a href="addcategories.php" class="account_link">Add Categories</a>
          <a href="reportedad.php" class="account_link">Ads Reported</a>
          <a href="userlist.php" class="account_link">Users List</a>
          </div> 
          <?php }else { ?> <?php } ?>
          <a href="../actions/logout.php" class="account_link" id="logout">Log Out</a>

        </div>
       
      </div>
    <?php
}

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
              <a href="../pages/profile.php">My Account</a>
            </li>
    
            <li>
              <a href="../pages/login.php">Login / Register</a>
            </li>
                
            <li>
              <a href="../pages/wishlist.php">Wishlist</a>
            </li>
    
            <li>
              <a href="../pages/browse.php">Shop</a>
            </li>
          </ul>
        </li>
        
        <li class="nav__item">
          <h2 class="nav__title">Quick Link</h2>
          
          <ul class="nav__ul">
            <li>
              <a href="../pages/privacypolice.php">Privacy Policy</a>
            </li>
            
            <li>
              <a href="../pages/termsofuse.php">Terms Of Use</a>
            </li>
            
            <li>
              <a href="../pages/faq.php">FAQ</a>
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
    <?php

function drawHeader(){





    ?>
     <div class="top_bar">
    </div>
     <nav class="nav">
      <div class="container nav_container">
        <div class="nav-title">
        <img src="../images/logo-removebg-preview.png" alt="Martech logo" class="logo" width="75px";>
        <a href="menu.php" class="nav_logo">MarTech</a></div>
        <ul class="nav_list">
          <li class="nav_item"><a href="../pages/menu.php" class="nav_link">Home</a></li>
          <li class="nav_item"><a href="../pages/sell.php" class="nav_link">Sell</a></li>
          <li class="nav_item"><a href="../pages/browse.php" class="nav_link">Products</a></li>
          <li class="nav_item">
            <a href="../pages/profile.php" class="nav_link">Account</a>
          </li>
        </ul>
        <div class="nav_items">
          <form action="../actions/search_action.php" class="nav_form" method="post">
            <input
              type="text"
              class="nav_input"
              id="search"
              name="input"
              placeholder="What are you looking for?" />
              <button type="submit" class="nav_search" id="search_btn">
                <img src="../images/search.png" alt="Search" id="btn_img"/>
             </button>
          </form>

        
    
          <img src="../images/heart.png" alt="" class="nav_heart"  id="favoriteIcon"/>
          <script type="text/javascript">
                document.getElementById("favoriteIcon").onclick = function () {
                location.href = "wishlist.php";
                };
              </script>
          <img src="../images/message.png" alt="" class="nav_heart" id="messageIcon"/>
          <script type="text/javascript">
                document.getElementById("messageIcon").onclick = function () {
                location.href = "chat.php";
                };
              </script>
    
        </div>
      </div>
    </nav>
    
    
    <?php 
    }
    ?>