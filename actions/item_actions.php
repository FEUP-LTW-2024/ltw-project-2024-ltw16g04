<?php
    require_once(__DIR__ . '/../conf.php');
    require_once(__DIR__ .'/../utils/session.php');
    require_once(__DIR__ .'/../data/connection.php');
    
    function drawItem($item_id) {
        $db = getDatabaseConnection();

        $query = 'SELECT * FROM Items WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute(array($item_id));
        $item = $stmt->fetch();

        if(!$item) {
            $session = new Session();
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

            $query = 'SELECT * FROM Users WHERE id = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($seller_id));
            $seller = $stmt->fetch();

            $seller_name = $seller['name'];

            $query = 'SELECT * FROM THUMBNAILS WHERE id_item = ?';
            $stmt = $db->prepare($query);
            $stmt->execute(array($item['id']));
            $thumbnails = $stmt->fetchAll();
        }
?>
<main>
    <section>
        <div class="container">
            <div class="left-side">
                <div class="items">
                    <div class="select-image">
                        <img src="<?php echo $main_image; ?>" alt="">
                    </div>
                    <div class="thumbnails">
                        <div class="thumbnail">
                            <?php foreach($thumbnails as $thumbnail){ ?>
                            <img src="<?php echo $thumbnail['url']; ?>" alt="">
                            <?php } ?>
                        </div>
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
                        </div>
                        <div class="buttons">
                            <a href="" class="getcontact">GET CONTACT</a>  
                            <a href="" class="cart">SEND MESSAGE</a>  
                        </div>
                        <div class="buttons">
                            <a href="" class="fav"><img src="../images/heart.png" alt=""> ADD TO FAVORITES</a>  
                            <a href="" class="cart"><img src="../images/cart.png" alt=""> ADD TO CART</a>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php } ?>
