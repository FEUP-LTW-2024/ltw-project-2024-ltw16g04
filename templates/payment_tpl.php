<?php 

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');
require_once(__DIR__ .'/../actions/favorites.php');

function drawPayment(){
    $session = new Session();
    $db = getDatabaseConnection();


if(!$session->isLoggedIn()) {
    $session->addMessage('error', 'Precisas de fazer login para ver checkout.');
    header('Location: ../pages/login.php');
    exit();
}

$user_id = $session->getId();




?>

<section class="section">
    <div class="container">
        <p>Payment</p>
    <div class="container payment_container">
    
      <div class="payment_form">
            <form action="../actions/payment_action.php" method="post">
            <label for="cards">Accepted Cards</label>
            <div class="payment-method">
                            <input type="radio" name="payment-method" id="method-1" checked>
                            <label for="method-1" class="payment-method-item">
                                <img src="../images/visa.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-2">
                            <label for="method-2" class="payment-method-item">
                                <img src="../images/mastercard.png" alt="">
                            </label>
                        </div>
        
                  <div class="name">
                    <div class="input-wrapper" id="input_fname">
                      <label for="name">Name on Card</label>
                      <input type="text" name="name" id="name" placeholder="Ex: JOHN DOE">
                    </div>
                  </div>
                  <div class="number">
                      <label for="card number">Credit card number</label>
                      <input type="text" name="card_number" id="card_number" placeholder="Ex: 1111-2222-3333-4444">
                  </div>
                  <div class="name">
                    <div class="input-wrapper" id="input_fname">
                      <label for="exp-date">Expiration Date</label>
                      <input type="text" name="exp-date" id="exp-date" placeholder="Ex: 01/30">
                    </div>
                    <div class="input-wrapper" id="input_lname">
                      <label for="CV">CV</label>
                      <input type="text" name="CV" id="CV" placeholder="Ex: 123">
                    </div>
                  </div>
                  <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'];?>">
                <div class="name">
                  <button id="place_order" name="place_order">Pay now</button>
                  <button id="go_back" name="go_back">Go back</button>
                </div>
              </form>
      </div>
      <div class="cart">
        <div class="cart_header">
          <p class="cart_header_price">Product</p>
          <p class="cart_header_price">Price</p>
        </div>

        <?php 
          $item_id = $session->getCheckoutItem(); 
          $query = 'SELECT * FROM Items WHERE id = ?';
          $stmt = $db->prepare($query);
          $stmt->execute(array($item_id));
          $item = $stmt->fetch();
          $name = $item['name'];
          $price = $item['price'];
          $img = $item['main_image'];
        ?>
        <div class="cart_items">
            <img src="<?php echo $img;?>" alt="" class="cart_img" />
            <p class="cart_title"><?php echo $name;?></p>
            <p class="cart_price">€ <?php echo $price;?></p>
          </div>
      </div>
        
    </div>
</div>
</section>



<?php }?>