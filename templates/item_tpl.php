<?php
    require_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    require_once(__DIR__ .'/../data/user.php');
    
    $session = new Session();
    $session->setItemId($_GET['id']);

    function drawItem($item_id) {
        $db = getDatabaseConnection();

        $query = 'SELECT * FROM Items WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($item_id));
        $item = $stmt->fetch();

        if(!$item) {
            $session->addMessage('error', 'O item não existe.');
            header('Location: ../pages/index.php');
            exit();
        } else {
            $name = $item['name'];
            $description = $item['description'];
            $price = $item['price'];
            $old_price = $item['old_price'];
            $category = $item['category'];
            $condition = $item['condition'];
            $location = $item['location'];
            $main_image = $item['main_image'];
            $seller_id = $item['seller_id'];
            $published_time = $item['published_time'];

            $user = User::getUser($seller_id, $db);
            $phone = $user->phone;
            

            $query = 'SELECT * FROM Users WHERE id = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($seller_id));
            $seller = $stmt->fetch();

            $seller_name = $seller['name'];

            $query = 'SELECT * FROM THUMBNAILS WHERE item_id = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($item['id']));
            $thumbnails = $stmt->fetchAll();
        }
?>
<main>
    <section>
        <div class="containerItem">
            <div class="left-side">
                <div class="items">
                    <div class="select-image">
                        <img src="<?php echo $main_image; ?>" alt="">
                    </div>
                    <div class="thumbnails">
                    <?php foreach($thumbnails as $thumbnail){ ?>
                        <div class="thumbnail">
                            <img src="<?php echo $thumbnail['url']; ?>" alt="">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="right-side">
                <div class="content">
                    <h6><?php echo $condition; ?></h6>
                    <h1><?php echo $name; ?></h1>
                    <p><?php echo $description; ?></p>
                    <span class="price">&#8364 <?php echo $price; ?></span>
                    <span class="off"> &#8364 <?php echo $old_price; ?></span>
                    <div class="options">
                        <div class="info-title">
                            <p>Sold by: <?php echo $seller_name; ?></p>
                            <p>Location: <?php echo $location; ?></p>
                            <p>Published: <?php echo $published_time; ?></p>
                            <p>Contact seller: <?php echo $phone; ?></p>
                        </div>
                        <div class="buttons">
                            <a href="" class="getcontact">REPORT AD</a>  
                            <a href="" class="cart">SEND MESSAGE</a>  
                        </div>
                        <div class="buttons">
                            <a href="../actions/fav_btn.php" class="fav"><img src="../images/heart.png" alt=""> ADD TO FAVORITES</a>  
                            <a href="../actions/cart_btn.php" class="cart"><img src="../images/cart.png" alt="">BUY NOW</a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php } ?>

<?php 

    function drawComments($item_id) {
        $db = getDatabaseConnection();

        $query = 'SELECT * FROM Comments WHERE item_id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($item_id));
        $comments = $stmt->fetchAll();

        if(!$comments) {
            return;
        }
        
?>


<section id="testimonials">
    <!--heading--->
    <div class="testimonial-heading">
        <span>Comments</span>
        <?php 
        if($session){
        foreach ($session->getMessages() as $messsage) { ?>
            <article class="<?=$messsage['type']?>">
            <?=$messsage['text']?>
            </article>
        <?php } }?>
        <h4>Clients Says</h4>
    </div>
    <!--testimonials-box-container------>
    <?php 
        foreach ($comments as $comment) {
            $user_id = $comment['user_id'];
            $query = 'SELECT * FROM Users WHERE id = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($user_id));
            $user = $stmt->fetch();
            $username = $user['name'];
            $comment_text = $comment['comment'];
            $rating = $comment['rating'];
            $created_at = $comment['created_at'];

             
    ?>
    <div class="testimonial-box-container">
        <!--BOX-1-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong><?php echo $username; ?></strong>
                        <span>@ <?php echo $username;?></span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <?php 
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            // Filled star icon
                            echo '<i class="fas fa-star"></i>';
                        } else {
                            // Empty star icon
                            echo '<i class="far fa-star"></i>';
                        }
                    }
                    ?>
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p><?php echo $comment_text; ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
  </section>
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>

<?php }

function drawAddComment($item_id) {
    $session = new Session(); 
    ?>
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
<?php } ?>
