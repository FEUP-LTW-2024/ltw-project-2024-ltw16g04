<?php

include_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');

function drawHeader(){





?>
<header>
      <div class ="border-top"></div>
      <div id="menu-bar">
        <img src="../images/logo-removebg-preview.png" alt="Martech logo" class="logo">
        <h1><a href="index.html" class="website-name">MarTech</a></h1>
        <button id="buyButton">BUY</button>
        <button id="sellButton">SELL</button>

        <form action="/search" method="get" id="search-bar">
          <input type="text" name="q" id="searchInput" placeholder="What are you looking for?">
          <button type="submit" class="search-button">
            <img src="../images/search.png" alt="search engine" id="search-icon"></button>
        </form>
        <img src="../images/user.png" alt="profile icon" class="icon-bar">
        <img src="../images/heart.png" alt="favorites icon" class="icon-bar">
        <img src="../images/shopping-basket.png" alt="basket icon" class="icon-bar">
      </div>
</header>
<?php 
}
?>