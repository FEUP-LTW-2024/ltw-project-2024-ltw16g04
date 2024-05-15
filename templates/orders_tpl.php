<?php
  declare(strict_types=1);

  require_once(__DIR__ . '/../utils/session.php');

  require_once(__DIR__ .'/../data/connection.php');

  
  function drawOrders() {
    $session = new Session();
    $db = getDatabaseConnection(); 
    $user_id = $session->getId(); 

    
    $query = 'SELECT * FROM Orders WHERE buyer_id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id));
    $orders = $stmt->fetchAll(); 

    

    ?>
    <section class="orders">
    <?php if(!$orders){
            echo '<p>No orders yet</p>';
            ?>
            </section>
            <?php
    }
    else {

        foreach ($orders as $order){
          $item_id = $order['item_id'];
          $query = 'SELECT * FROM Items WHERE id = ?';
          $stmt = $db->prepare($query);
          $stmt->execute(array($item_id));
          $item = $stmt->fetch();
          $item_name = $item['name'];
          $price = $order['amount'];
          $created_at = $order['created_at'];
          $seller_id = $order['seller_id'];
          $query = 'SELECT * FROM Users WHERE id = ?';
          $stmt = $db->prepare($query);
          $stmt->execute(array($seller_id));

          $seller = $stmt->fetch();
          $seller_name = $seller['name'];


    ?>
        <table class="order_table">
          <tr>
              <th>ID</th>
              <th>Product</th>
              <th>Seller</th>
              <th>Date</th>
              <th>Value</th>
          </tr>
          <tr>
              <td>#<?php echo $item_id;?></td>
              <td><?php echo $item_name;?></td>
              <td><?php echo $seller_name;?></td>
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
