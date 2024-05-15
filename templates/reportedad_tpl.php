<?php 

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');


function drawReportedAds(){
    $session = new Session();
    $db = getDatabaseConnection();
    $user_id = $session->getId();
    //seleciona todos os favoritos daquele usuario
    $query = 'SELECT * FROM Favorites WHERE user_id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id));
    $favorites = $stmt->fetchAll();

   
    
?>

<section class="section">
  <div class="container">


    <div class="products">
    <?php 
    if(!$favorites){
        echo '<p>No favorites yet.</p>';
    }
    
    foreach($favorites as $favorite){ 
            $query = 'SELECT * FROM Items WHERE id = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($favorite['item_id']));
            $item = $stmt->fetch();
            $name = $item['name'];
            $price = $item['price'];
            $img = $item['main_image']; 
            $buy_button_id = 'buy_btn_' . $item['id'];

            ?>
      <div class="card">
        <div class="card_content">
        <div class="card_top">
          <img src="<?php echo $img;?>" alt="" class="card_img" />
          <script type="text/javascript">
            document.getElementById("<?php echo $buy_button_id;?>").onclick = function () {
            location.href = "item.php?id=<?php echo $item['id'];?>";
            };
          </script>
        </div>
        <div class="card_body">
          <h2 class="card_title">Item id</h2>
          <div class="report-description">
          <p id="description">"Its very offensive! Please review it dnfuiwefebefiubuifubwuifbbwufbiurfbcsjndcjksnrjfbacsciaddsjkfhsifhiwheifisfhhiscaxmnadbaifhef"</p></div>
          <button id="<?php echo $buy_button_id; ?>" class="buy_btn">Delete Ad</button>
        </div>
        </div>
      </div>
      <div class="card">
        <div class="card_content">
        <div class="card_top">
          <img src="<?php echo $img;?>" alt="" class="card_img" />
          <script type="text/javascript">
            document.getElementById("<?php echo $buy_button_id;?>").onclick = function () {
            location.href = "item.php?id=<?php echo $item['id'];?>";
            };
          </script>
        </div>
        <div class="card_body">
          <h2 class="card_title">Item id</h2>
          <div class="report-description">
          <p id="description">"Its very offensive! Please review it dnfuiwefebefiubuifubwuifbbwufbiurfbcsjndcjksnrjfbacsciaddsjkfhsifhiwheifisfhhiscaxmnadbaifhef"</p></div>
          <button id="<?php echo $buy_button_id; ?>" class="buy_btn">Delete Ad</button>
        </div>
        </div>
      </div>
      <div class="card">
        <div class="card_content">
        <div class="card_top">
          <img src="<?php echo $img;?>" alt="" class="card_img" />
          <script type="text/javascript">
            document.getElementById("<?php echo $buy_button_id;?>").onclick = function () {
            location.href = "item.php?id=<?php echo $item['id'];?>";
            };
          </script>
        </div>
        <div class="card_body">
          <h2 class="card_title">Item id</h2>
          <div class="report-description">
          <p id="description">"Its very offensive! Please review it dnfuiwefebefiubuifubwuifbbwufbiurfbcsjndcjksnrjfbacsciaddsjkfhsifhiwheifisfhhiscaxmnadbaifhef"</p></div>
          <button id="<?php echo $buy_button_id; ?>" class="buy_btn">Delete Ad</button>
        </div>
        </div>
      </div>
      </div>
      <?php } ?>
      </div>
    </div>
</section>

<?php } ?>