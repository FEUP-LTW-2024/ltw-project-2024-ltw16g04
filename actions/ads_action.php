<?php
require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');



function drawMyAds(){
    $session = new Session();
    $seller_id = $session->getId();
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM Items WHERE seller_id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute(array($seller_id));
    $ads = $stmt->fetchAll();

?>
    <section class="ad_header">
      <div class= "ad_header_container">
        <p>Home / My Ads</p>
        <p>Here is your ads, <?php echo 
        $session->getName();
        ?>!</p>
      </div>  
    </section>
    <section class="account">
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
      <section class="ads">
      <?php if(!$ads){
            echo '<p>No ads yet.</p>';
        ?>
        </section>
        </section>
        <?php
        }
        else {
            foreach ($ads as $ad){
                $name = $ad['name'];
                $price = $ad['price'];
                $img = $ad['main_image'];
                $id = $ad['id'];
                $edit_button_id = 'edit_btn_' . $ad['id'];
                
        ?>
        <div class="card">
          <div class="card_top">
          <img src="<?php echo $img;?>" alt="" class="card_img" />
            <button class="add_btn" id="<?php echo $edit_button_id;?>">Edit</button>
            <script type="text/javascript">
              document.getElementById("<?php echo $edit_button_id;?>").onclick = function () {
              location.href = "edit.php?id=<?php echo $id;?>";
                //todo page edit.php
            };
            </script>
          </div>
          <div class="card_body">
            <h3 class="card_title"><?php echo $name;?></h3>
            <p class="card_price">€<?php echo $price;?></p>
          </div>
        </div>
      </section>
      <?php
            }
        ?>
    </section>
    <section class="add_new_ad">
      <button class="add_new">Add new ad</button>
    </section>
<?php 
        }
}?>

