<?php
  declare(strict_types=1);

  require_once(__DIR__ . '/../utils/session.php');

  require_once(__DIR__ .'/../data/connection.php');

  
  function drawSoldItems() {
    $session = new Session();
    $db = getDatabaseConnection();
    $user_id = $session->getId(); 

    
    $query = 'SELECT * FROM Orders WHERE seller_id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id));
    $orders = $stmt->fetchAll(); 
    

    ?>
    <section class="orders">   margin-top: 1em;
    margin-bottom: 1em;
    <?php if(!$orders){
            echo '<p>You have not sold any items yet</p>';
            ?>
            </section>
            <?php
    }
    else {

        foreach ($orders as $order){
          $item_id = $order['item_id'];
          $item_name = $order['item_name'];
          $price = $order['amount'];
          $created_at = $order['created_at'];
          $seller_id = $order['seller_id'];
          $buyer_id = $order['buyer_id'];
          $query = 'SELECT * FROM Users WHERE id = ?';
          $stmt = $db->prepare($query);
          $stmt->execute(array($buyer_id));

          $buyer = $stmt->fetch();
          $buyer_name = $buyer['name'];

#<?php echo $item_id;?><
    ?>
        <a href="../pages/shippingform.php" class="order_link">
        <table class="order_table">
          <tr>
              <th>ID</th>
              <th>Product</th>
              <th>Buyer</th>
              <th>Date</th>
              <th>Value </th>
          </tr>
          <tr>
              <td>#<?php echo $item_id;?></td>
              <td><?php echo $item_name;?></td>
              <td><?php echo $item_name;?></td>
              <td><?php echo $created_at;?></td>
              <td>€<?php echo $price;?></td>
          </tr>
        </table>
        </a>
    <?php
        }  
        ?>
        </section>
        <?php
    }
}
?>
