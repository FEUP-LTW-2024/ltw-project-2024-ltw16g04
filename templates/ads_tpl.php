<?php
require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');


function drawMyAds(){
    require_once(__DIR__ .'/../data/item.php');
    require_once(__DIR__ .'/../templates/common_tpl.php');

    $session = new Session();
    $seller_id = $session->getId();
    $db = getDatabaseConnection();
    $ads = Item::findMyItems($seller_id, $db);

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
      <?php
      drawAccountNav();
      ?>
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
      <script type="text/javascript">
        document.querySelector('.add_new').onclick = function () {
          location.href = "sell.php";
        };
      </script>
    </section>
<?php 
        }
}?>

