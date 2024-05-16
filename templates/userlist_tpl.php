<?php
  declare(strict_types=1);

  require_once(__DIR__ . '/../utils/session.php');

  require_once(__DIR__ .'/../data/connection.php');

  
  function drawUserList() {
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
          $item_name = $order['item_name'];
          $price = $order['amount'];
          $created_at = $order['created_at'];
          $seller_id = $order['seller_id'];
          $query = 'SELECT * FROM Users WHERE id = ?';
          $stmt = $db->prepare($query);
          $stmt->execute(array($seller_id));

          $seller = $stmt->fetch();
          $seller_name = $seller['name'];


    ?>

    <div class="user_container">
        <table class="order_table">
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <tr>
                <td>#<?php echo $item_id;?></td>
                <td><?php echo $item_name;?></td>
                <td><?php echo $seller_name;?></td>
            </tr>
        </table>
        <div class="buttons">
            <button id="button1">Elevate to Admin</button>
            <button id="button2">Delete User</button>
        </div>
    </div>

        </a>
    <?php
        }  
        ?>
        </section>
        <?php
    }
}
?>
