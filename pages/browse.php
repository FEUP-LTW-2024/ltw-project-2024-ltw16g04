<?php

function drawBrowse($price = null, $category = null, $condition = null, $search = null) {
    require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/../data/connection.php');
    require_once(__DIR__ . '/../data/user.php');
    require_once(__DIR__ . '/../templates/browse_tpl.php');
    require_once(__DIR__ . '/../templates/common_tpl.php');
    require_once(__DIR__ . '/../data/item.php');

    $session = new Session();
    $filters = [
        'price' => $price,
        'category' => $category,
        'condition' => $condition,
        'search' => $search
    ];

    // Fetch items based on filters
    $items = getItems($filters);

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
    <body>
    <?php
    drawHeader();
    ?>
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
            } 
            // Draw items based on filters
            else{
            drawItems($items);
            }
?>
        </div>
    </section>
    <?php
    drawFooter();
    ?>
    </body>
    </html>
    <?php
}

// Check if filters are provided via query parameters and call the drawBrowse function accordingly
if (isset($_GET['price']) || isset($_GET['category']) || isset($_GET['condition']) || isset($_GET['search'])) {
    $price = $_GET['price'] ?? null;
    $category = $_GET['category'] ?? null;
    $condition = $_GET['condition'] ?? null;
    $search = $_GET['search'] ?? null;
    drawBrowse($price, $category, $condition, $search);
} else {
    // If no filters provided, call drawBrowse with null parameters
    drawBrowse();
}

?>
