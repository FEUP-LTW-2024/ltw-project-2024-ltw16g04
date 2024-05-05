<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once (__DIR__ . '/../actions/item_actions.php');
  require_once(__DIR__ . '/../actions/footer.php');
  require_once(__DIR__ . '/../actions/top_bar.php');


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
    if ($session->isLoggedIn()) { ?>
      <div class="comment-box">
      <section id="messages">
			      <?php foreach ($session->getMessages() as $messsage) { ?>
				      <article class="<?=$messsage['type']?>">
				      <?=$messsage['text']?>
				      </article>
			       <?php } ?>
			  </section>
        <h2>Add Your Comment</h2>
        <form action="../actions/make_comment.php" method="post">
          <!-- Star rating input -->
          <div id="full-stars-example-two">
           <div class="rating-group">
            <label>Rate this item:</label>
            <input class="rating__input" name="rating" id="rating-1" value="1" type="radio">
            <label aria-label="1 star" class="rating__label" for="rating-1"><i class="rating__icon rating__icon--star fas fa-star"></i></label>
            <input class="rating__input" name="rating" id="rating-2" value="2" type="radio">
            <label aria-label="2 stars" class="rating__label" for="rating-2"><i class="rating__icon rating__icon--star fas fa-star"></i></label>
            <input class="rating__input" name="rating" id="rating-3" value="3" type="radio">
            <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fas fa-star"></i></label>
            <input class="rating__input" name="rating" id="rating-4" value="4" type="radio">
            <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fas fa-star"></i></label>
            <input class="rating__input" name="rating" id="rating-5" value="5" type="radio">
            <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fas fa-star"></i></label>
            </div>
            </div>
          <textarea name="comment" id="" cols="30" rows="10" placeholder="Type your comment"></textarea>
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
           
          <button id="submit">Submit Comment</button>

        </form>
        
      </div>
      <?php }
      else {
      
      ?>

      <div class="comment-box">
        <h4>You must be logged in to leave your comment!</h4>
        <a href="../pages/login.php">Login</a>
      </div>

      <?php } ?>

    <!--FOOTER-->
      
    <?php drawFooter(); ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>