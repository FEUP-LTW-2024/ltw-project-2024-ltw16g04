<?php 

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');


function drawFavorites(){
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

    <div class="section_header">
      <h3 class="section_title">Wishlist</h3> 
    </div>
    <div class="products">
      <div class="card">
        <div class="card_top">
        <?php foreach($favorites as $favorite){ 
            $query = 'SELECT * FROM Items WHERE id = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($favorite['item_id']));
            $item = $stmt->fetch();
            $name = $item['name'];
            $price = $item['price'];
            $img = $item['main_image']; 

            ?>
          <img src="<?php echo $img;?>" alt="" class="card_img" />
          <button id="myButton" class="buy_btn">Buy</button>
          <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "item.php?id=<?php echo $item['id'];?>";
    };
</script>
        </div>
        <div class="card_body">
          <h3 class="card_title"><?php echo $name;?></h3>
          <p class="card_price">$<?php echo $price ?></p>
        </div>
        <?php } ?>
      </div>
      </div>
      </div>
    </div>
</section>

<?php } ?>