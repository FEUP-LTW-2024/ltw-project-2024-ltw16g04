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
      <li class="nav_item"><a href="../pages/sell.html" class="nav_link">Sell</a></li>
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
            location.href = "chat.html";
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