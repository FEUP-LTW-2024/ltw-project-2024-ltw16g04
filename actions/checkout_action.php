<?php 

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');


function drawCheckout(){
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
        <p>Billing details</p>
    <div class="container billing_container">
    
      <div class="billing_form">
            <form action="../actions/billing.php" method="post">
                  <div class="name">
                    <div class="input-wrapper" id="input_fname">
                      <label for="first-name">First Name</label>
                      <input type="text" name="fname" id="fname" placeholder="Your First Name">
                    </div>
                    <div class="input-wrapper" id="input_lname">
                      <label for="last-name">Last Name</label>
                      <input type="text" name="lname" id="lname" placeholder="Your Last Name">
                    </div>
                  </div>
                  <div class="address">
                      <label for="address">Street Address</label>
                      <input type="text" name="address" id="address" placeholder="Ex: Street Santo Silva, 123">
                  </div>
                  <div class="address">
                    <label for="address">Apartment, floor, etc. (optional)</label>
                    <input type="text" name="apartment" id="address" placeholder="Ex: Apartment 0110">
                </div>
                <div class="address">
                    <label for="address">City and Country</label>
                    <input type="text" name="city" id="address" placeholder="Ex: Porto, Portugal">
                </div>
                  <div class="email">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" placeholder="Ex: johndoe@mail.com">
                </div>
                <div class="phone">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Ex: +351 999888777">
                </div>
                <div class="name">
                  <button id="place_order" name="place_order">Place order</button>
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
        $checkoutItems = $session->getCheckoutItems();
        foreach($checkoutItems as $item_id) {
            $query = 'SELECT * FROM Items WHERE id = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($item_id));
            $item = $stmt->fetch();
            $name = $item['name'];
            $price = $item['price'];
            $img = $item['main_image'];
            $remove_id = 'remove_item_' . $item_id;
        ?>
        <div class="cart_items">
            <img src="<?php echo $img;?>" alt="" class="cart_img" />
            <p class="cart_title"><?php echo $name;?></p>
            <p class="cart_price">€ <?php echo $price;?></p>
            <!-- add remove item from cart button-->
            <button id="<?php echo $remove_id;?>" name="remove_item">Remove</button>
            <script type="text/javascript">
                document.getElementById("<?php echo $remove_id;?>").onclick = function () {
                    <?php $session->removeCheckoutItem($item_id);?>;
                    window.location.reload();
                };
            </script>
          </div>
        <?php } ?>
      </div>
        
    </div>
</div>
</section>



<?php }?>