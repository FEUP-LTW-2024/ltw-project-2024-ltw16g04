<?php
  
  require_once (__DIR__ . '/../actions/item_actions.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/itemstyle.css">
    <title>Shop</title>
</head>
<body>
    <!--NAV BAR-->
    
    <header>
        <div class ="border-top"></div>
        <div id="menu-bar">
          <img src="../images/logo.png" alt="Martech logo" class="logo">
          <h1><a href="index.html" class="website-name">MarTech</a></h1>
          <button id="buyButton">BUY</button>
          <button id="sellButton">SELL</button>
  
          <form action="/search" method="get" id="search-bar">
            <input type="text" name="q" id="searchInput" placeholder="What are you looking for?">
            <button type="submit" class="search-button">
              <img src="../images/search.png" alt="search engine" id="search-icon"></button>
          </form>
          <img src="../images/user.png" alt="profile icon" class="icon-bar">
          <img src="../images/heart.png" alt="favorites icon" class="icon-bar">
          <img src="../images/shopping-basket.png" alt="basket icon" class="icon-bar">
        </div>
      </header>
      
    <!-- Showcase -->
    
    
    <?php
    $itemId = $_GET['id'];
    drawItem($itemId) ?>

    <!-- Testimonials -->

  <section id="testimonials">
    <!--heading--->
    <div class="testimonial-heading">
        <span>Comments</span>
        <h4>Clients Says</h4>
    </div>
    <!--testimonials-box-container------>
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
                        <strong>Liam mendes</strong>
                        <span>@liammendes</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i><!--Empty star-->
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
            </div>
        </div>
        <!--BOX-2-------------->
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
                        <strong>Noah Wood</strong>
                        <span>@noahwood</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><!--Empty star-->
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
            </div>
        </div>
        <!--BOX-3-------------->
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
                        <strong>Oliver Queen</strong>
                        <span>@oliverqueen</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i><!--Empty star-->
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
            </div>
        </div>
        <!--BOX-4-------------->
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
                        <strong>Barry Allen</strong>
                        <span>@barryallen</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i><!--Empty star-->
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
            </div>
        </div>
    </div>
  </section>
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>

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
        <form action="#">
          <input type="text" name = "full_name" placeholder="Full Name...">
          <input type="text" name="username" placeholder="Username...">
          <textarea name="comment" id="" cols="30" rows="10" placeholder="Type your comment"></textarea>
          
          <button type="submit">Submit Comment</button>

        </form>
      </div>

    <!--FOOTER-->
    <footer class="footer">
        <div class="footer__addr">


          <h1 class="footer__logo">
            MarTech</h1>

            <h2>Contact</h2>
    
            <address>
              5534 Somewhere In. The World 22193-10212<br>
                  
              <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
            </address>
              
          
        </div>
        
        <ul class="footer__nav">
          <li class="nav__item">
            <h2 class="nav__title">Account</h2>
      
            <ul class="nav__ul">
              <li>
                <a href="#">My Account</a>
              </li>
      
              <li>
                <a href="#">Login / Register</a>
              </li>
                  
              <li>
                <a href="#">Cart</a>
              </li>

              <li>
                <a href="#">Wishlist</a>
              </li>

              <li>
                <a href="#">Shop</a>
              </li>
            </ul>
          </li>
          
          <li class="nav__item">
            <h2 class="nav__title">Quick Link</h2>
            
            <ul class="nav__ul">
              <li>
                <a href="#">Privacy Policy</a>
              </li>
              
              <li>
                <a href="#">Terms Of Use</a>
              </li>
              
              <li>
                <a href="#">FAQ</a>
              </li>
              
            </ul>
          </li>
          
        </ul>
        
        <div class="legal">
          <p>&copy; Copyrigth FEUP\LTW 2024. All rights reserved.</p>
        
        </div>
      </footer>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>