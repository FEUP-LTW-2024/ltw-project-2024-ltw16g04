<?php 


function drawBrowse($price, $category, $condition) {
  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../data/connection.php');
  require_once(__DIR__ . '/../data/user.php');
  require_once(__DIR__ . '/../actions/browse_actions.php');
  require_once(__DIR__ . '/../actions/top_bar.php');
  require_once(__DIR__ . '/../actions/footer.php');


    $session = new Session();
    $filters = [
        'price' => $price,
        'category' => $category,
        'condition' => $condition
    ];
    


?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Martech</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/browse.css" rel="stylesheet">
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
  
<?php
  drawHeader();
?>
 
<!--MAIN-->

<section class="section">
  <div class="container">
<?php
  drawFilter();
  // Process form submission and draw filtered items
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filters = [
      'price' => $_POST['price'] ?? '',
      'category' => $_POST['category'] ?? '',
      'condition' => $_POST['condition'] ?? ''
  ];
  $filteredItems = getItems($filters);
  drawItems($filteredItems);
  } else {
  // If no form submission, draw all items
    $allItems = getItems($filters);
    drawItems($allItems);
  }

  ?>
  </div>
</section>
<!--FOOTER-->

<?php
  drawFooter();
  ?>
</body>

</html>

<?php
} 

drawBrowse(null, null, null);

?>

