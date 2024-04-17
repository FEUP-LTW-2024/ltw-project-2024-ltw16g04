<?php

include_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');

function drawHeader(){





?>
 <div class="top_bar">
</div>
 <nav class="nav">
  <div class="container nav_container">
    <div class="nav-title">
    <img src="../images/logo-removebg-preview.png" alt="Martech logo" class="logo" width="75px";>
    <a href="menu copy.html" class="nav_logo">MarTech</a></div>
    <ul class="nav_list">
      <li class="nav_item"><a href="/" class="nav_link">Home</a></li>
      <li class="nav_item"><a href="#" class="nav_link">Sell</a></li>
      <li class="nav_item"><a href="#" class="nav_link">Products</a></li>
      <li class="nav_item">
        <a href="/sign-up.html" class="nav_link">Account</a>
      </li>
    </ul>
    <div class="nav_items">
      <form action="#" class="nav_form">
        <input
          type="text"
          class="nav_input"
          placeholder="What are you looking for?" />
        <img src="../images/search.png" alt="" class="nav_search" />
      </form>

      <img src="../images/heart.png" alt="" class="nav_heart" />
      <img src="../images/message.png" alt="" class="nav_heart" />

    </div>
  </div>
</nav>
<?php 
}
?>