<?php
  declare(strict_types=1);

  require_once(__DIR__ . '/../utils/session.php');

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../actions/top_bar.php');
  require_once(__DIR__ .'/../actions/footer.php');
  
  function drawOrders() {
    $session = new Session();
    $db = getDatabaseConnection(); // Conexão com o banco de dados
    $user_id = $session->getId(); // Obtém o ID do usuário da sessão

    // Consulta para obter todos os pedidos para o usuário
    $query = 'SELECT * FROM Orders WHERE user_id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id));
    $orders = $stmt->fetchAll(); // Obter todos os pedidos do banco de dados

    ?>
    <section class="section">
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">My Orders</h3> 
            </div>
            <div class="orders">
                <?php foreach($orders as $order) { ?>
                    <div class="order_card">
                        <h4>Order #<?php echo $order['order_id']; ?></h4>
                        <p>Order Date: <?php echo $order['order_date']; ?></p>
                        <p>Total: $<?php echo $order['total']; ?></p>
                        <button onclick="location.href='order_detail.php?id=<?php echo $order['order_id']; ?>'">View Order</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php
}
?>
