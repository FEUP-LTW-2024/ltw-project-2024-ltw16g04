<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once (__DIR__ . '/../templates/item_tpl.php');
  require_once(__DIR__ . '/../templates/common_tpl.php');
  require_once(__DIR__ . '/../data/connection.php');
  require_once(__DIR__ . '/../data/item.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/itemstyle.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/topbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    

    <title>Shop</title>
</head>
<body id="itemsBody">
    <!--NAV BAR-->
    
    <?php drawHeader(); ?>
      
    <!-- Showcase -->
    
    
    <?php
    $itemId = $_GET['id'];
    drawItem($itemId) ?>

    <!-- Testimonials -->
    <?php
    drawComments($itemId); ?>

    <!--Add Comment-->
    <?php
    drawAddComment($itemId); ?>

    <!--FOOTER-->
      
    <?php drawFooter(); ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>