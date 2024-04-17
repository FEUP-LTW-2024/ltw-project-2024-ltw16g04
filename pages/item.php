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
    <title>Shop</title>
</head>
<body>
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

      <div class="comment-box">
        <h2>Add Your Comment</h2>
        <div id="full-stars-example-two">
          <div class="rating-group">
              <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
              <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
              <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
              <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
              <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
              <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
              <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
              <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
              <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
              <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
              <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
          </div>
          </div>
        <form action="../actions/make_comment.php" method="post">
          <input type="text" name = "name" placeholder="Full Name...">
          <input type="text" name="email" placeholder="Email...">
          <textarea name="comment" id="" cols="30" rows="10" placeholder="Type your comment"></textarea>
          <section id="messages">
			            <?php foreach ($session->getMessages() as $messsage) { ?>
				            <article class="<?=$messsage['type']?>">
				            <?=$messsage['text']?>
				            </article>
			            <?php } ?>
			          </section>
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">

          <button id="submit">Submit Comment</button>

        </form>
      </div>

    <!--FOOTER-->
      
    <?php drawFooter(); ?>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>