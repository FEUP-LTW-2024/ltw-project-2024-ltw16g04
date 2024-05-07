<?php 

function drawAccountNav(){
    ?>
    <div class="container account_nav">
        <div class="account_title">
        <h1 class="profile_title">Manage My Account</h1></div>
        <div class="account_selector">
          <a href="profile.php" class="account_link">My Profile</a>
          <a href="order.php" class="account_link">My Orders</a>
          <a href="wishlist.php" class="account_link">My Wishlist</a>
          <a href="myads.php" class="account_link">My Ads</a>
          <a href="login.php" class="account_link" id="logout">Log Out</a>
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
          <form action="#" class="nav_form">
            <input
              type="text"
              class="nav_input"
              id="search"
              placeholder="What are you looking for?" />
            <img src="../images/search.png" alt="" class="nav_search" />
    
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
    
    <div id="searchResults"></div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#search').keyup(function(){
          var input = $(this).val();
          if(input.length > 0){
            $.ajax({
              url: '../actions/search_action.php',
              method: 'POST',
              data: {input:input},
              success: function(data){
                $('#searchResults').html(data);
              }
          });
          }else{
            $('#searchResults').css("display", "none");
          }
        });
      });
    
    </script>
    <?php 
    }
    ?>