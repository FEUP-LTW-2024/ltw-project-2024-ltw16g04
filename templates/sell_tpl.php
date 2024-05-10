<?php




function drawSell(){

?>


<section class="section">
    <div class="container">
        <p>Sell a product</p>
    <div class="container billing_container">
    
      <div class="billing_form">
        <p>Details about the product</p>
            <form action="../actions/createAd.php" method="post" enctype="multipart/form-data">
                  <div class="title">
                    <div class="input-wrapper" id="input_title">
                      <label for="title">Title</label>
                      <input type="text" name="name" id="title_product" placeholder="Ex: Airpods Gen 2" required>
                    </div>
                  </div>
                  <div class="category">
                    <label for="category">Category</label>
                    <select name="category" id="category" required>
                      <option value="" disabled selected>Select a category</option>
                      <option value="Audio, Photo & Video">Audio, Photo & Video (Not camera)</option>
                      <option value="Cameras">Cameras</option>
                      <option value="Components">Components</option>
                      <option value="Computers">Computers</option>
                      <option value="Consoles">Consoles</option>
                      <option value="Gaming">Gaming</option>
                      <option value="Headphones">Headphones</option>
                      <option value="Smartphones">Smartphones</option>
                      <option value="Peripheral Devices">Peripheral Devices</option>
                      <option value="Tablets">Tablets</option>
                      <option value="Watches">Watches</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="category">
                    <label for="condition">Condition</label>
                    <select name="condition" id="category" required>
                      <option value="" disabled selected>Select a condition</option>
                      <option value="New">New</option>
                      <option value="Like new">Like new</option>
                      <option value="Fair">Fair</option>
                      <option value="Used">Used</option>
                      <option value="Damaged">Damaged</option>
                    </select>
                  </div>
                  <div class="upload-image">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" id="image" multiple accept="image/*" required>
                    <p>Upload an image of the product (accepted formats: JPG, PNG, GIF).</p>
                  </div>
                  <div class="description">
                      <label for="product_description">Description</label>
                      <textarea id="description" name="description" rows="4" cols="50" placeholder="Enter your description here..."></textarea>
                  </div>
                  <div class="price">
                    <label for="price">Price to be sold</label>
                    <input type="text" name="price" id="address" placeholder="Ex: 20">
                </div>
                  <p>Details of the seller</p>
                  <div class="name">
                    <label for="name">Name of the seller</label>
                    <input type="text" name="seller" id="address" placeholder="Ex: John Doe">
                </div>
                <div class="address">
                    <label for="address">Location (City or postal code)</label>
                    <input type="text" name="location" id="address" placeholder="Ex:1234-567">
                </div>
                  <div class="email">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" placeholder="Ex: johndoe@mail.com">
                </div>
                <div class="buttons">
                  <button id="place_order" name="create_ad">Add ad</button>
                  <button id="go_back" name="go_back">Go back</button>
                </div>
              </form>
      </div>
      </div>
      </div>
    </section>

<?php } ?>