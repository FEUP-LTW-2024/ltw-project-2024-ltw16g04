<?php
  declare(strict_types = 1);

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../data/user.php');
  require_once(__DIR__ .'/../templates/common_tpl.php');
  require_once(__DIR__ .'/../utils/session.php');

  $session = new Session();
  if(!$session->isLoggedIn()) {header('Location: ../pages/login.php');
  exit();}
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Admin Actions</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/addcategories.css" rel="stylesheet">
    <link href="../CSS/topbar.css" rel="stylesheet">
    <link href="../CSS/footer.css" rel="stylesheet">
    <!-- fonts used  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- end here -->
  </head>
  
<header class="header">
  <?php drawHeader(); ?>
</header>
<body id= "edit_category_body">
  <section class="category_header">
    <div class= "category_header_container">
      <p>Home / Add Categories</p>
      <p>Here you can add or delete categories, <?php echo 
      $session->getName();  
      ?>!</p>
    </div>    
  </section>
  <section class="account">
    <?php drawAccountNav();
    
    $user = User::getUser($session->getId(), getDatabaseConnection());
    $phone = $user->phone;
    ?>  


    <section class= "edit_categories">
  
      <h1 class="profile_sub">Add a new category</h2>
      <form action="../actions/edit_categories_action.php" method="post">
            <div id="input_category">
                <input type="text" name="add_category" id="add_category" placeholder="Ex: Laptops" required>
              </div>
            <div class="finish_add_category">
            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'];?>">
              <button id="add_btn" name = "add_button">Add Category</button>
            </div>
        </form>

        <h1 class="profile_sub">Delete a category</h2>
      <form action="../actions/edit_categories_action.php" method="post">
            <div id="select_category">
                    <select name="category" id="category" required>
                    <option value="" disabled selected>Select a category</option>
                      <?php 
                      $db = getDatabaseConnection();
                      $query = 'SELECT * FROM CATEGORIES';
                      $stmt = $db->prepare($query);
                      $stmt->execute();
                      $categories = $stmt->fetchAll();
                      foreach($categories as $category) {
                        echo '<option value="' . $category['name'] . '">' . htmlspecialchars($category['name']) . '</option>';
                      }
                      ?>
                    </select>
              </div>
            <div class="finish_delete_category">
            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'];?>">
              <button id="delete_btn" name = "delete_button">Delete Category</button>
            </div>
        </form>

    </section>

    
  </section>
  
        <?php drawFooter(); ?>
    </body>
  