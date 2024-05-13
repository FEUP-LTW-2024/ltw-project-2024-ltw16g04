<?php
require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');

$session = new Session();

require_once(__DIR__ . '/../templates/common_tpl.php');
require_once(__DIR__ . '/../templates/payment_tpl.php');

require_once(__DIR__ . '/../data/item.php');

?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Payment</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/payment.css" rel="stylesheet">
    <!-- fonts used  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- end here -->
  </head>
 <!-- Header -->
 <body>
  
<?php drawHeader(); ?>

<?php drawPayment(); ?>

<!--FOOTER-->
<?php drawFooter(); ?>
</body>

</html>