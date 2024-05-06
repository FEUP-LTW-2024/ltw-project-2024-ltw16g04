<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Martech</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/sell.css" rel="stylesheet">
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
  
  <div class="top_bar">
  </div>
   <nav class="nav">
    <div class="container nav_container">
      <div class="nav-title">
      <img src="../images/logo-removebg-preview.png" alt="Martech logo" class="logo" width="75px";>
      <a href="menu copy.html" class="nav_logo">MarTech</a></div>
      <ul class="nav_list">
        <li class="nav_item"><a href="/" class="nav_link">Home</a></li>
        <li class="nav_item"><a href="#" class="nav_link">Sell</a></li>
        <li class="nav_item"><a href="#" class="nav_link">Products</a></li>
        <li class="nav_item">
          <a href="/sign-up.html" class="nav_link">Account</a>
        </li>
      </ul>
      <div class="nav_items">
        <form action="#" class="nav_form">
          <input
            type="text"
            class="nav_input"
            placeholder="What are you looking for?" />
          <img src="../images/search.png" alt="" class="nav_search" />
        </form>
  
        <img src="../images/heart.png" alt="" class="nav_heart" />
        <img src="../images/message.png" alt="" class="nav_heart" />
  
      </div>
    </div>
  </nav>

  <section class="section">
    <div class="container">
        <p>Sell a product</p>
    <div class="container billing_container">
    
      <div class="billing_form">
        <p>Details about the product</p>
            <form action="../actions/billing.php" method="post">
                  <div class="title">
                    <div class="input-wrapper" id="input_title">
                      <label for="title">Title</label>
                      <input type="text" name="title" id="title_product" placeholder="Ex: Airpods Gen 2" required>
                    </div>
                  </div>
                  <div class="category">
                    <label for="category">Category</label>
                    <select name="category" id="category" required>
                      <option value="" disabled selected>Select a category</option>
                      <option value="audio">Audio, Photo & Video (Not camera)</option>
                      <option value="cameras">Cameras</option>
                      <option value="components">Components</option>
                      <option value="computers">Computers</option>
                      <option value="gaming">Gaming</option>
                      <option value="headphones">Headphones</option>
                      <option value="phones">Phones</option>
                      <option value="peripheral">Peripheral Devices</option>
                      <option value="tablets">Tablets</option>
                      <option value="watches">Watches</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                  <div class="upload-image">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" id="image" accept="image/*" required>
                    <p>Upload an image of the product (accepted formats: JPG, PNG, GIF).</p>
                  </div>
                  <div class="description">
                      <label for="product_description">Description</label>
                      <textarea id="description" name="description" rows="4" cols="50" placeholder="Enter your description here..."></textarea>
                  </div>
                  <p>Details of the seller</p>
                  <div class="name">
                    <label for="name">Name of the seller</label>
                    <input type="text" name="apartment" id="address" placeholder="Ex: John Doe">
                </div>
                <div class="address">
                    <label for="address">Location (City or postal code)</label>
                    <input type="text" name="city" id="address" placeholder="Ex:1234-567">
                </div>
                  <div class="email">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" placeholder="Ex: johndoe@mail.com">
                </div>
                <div class="phone">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Ex: +351 999888777">
                </div>
                <div class="buttons">
                  <button id="place_order" name="place_order">Add ad</button>
                  <button id="go_back" name="go_back">Go back</button>
                </div>
              </form>
      </div>
      </div>
      </div>
    </section>

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
  
</body>

</html>