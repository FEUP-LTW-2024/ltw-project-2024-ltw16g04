<?php
require_once('../utils/session.php');
require_once('../data/connection.php');
require_once('../data/user.php');



function getItems($filters) {

    $session = new Session();
    
    if(!empty($filters['search'])){
        $items = $session->getSearchItem();
        return $items;
    }

    $db = getDatabaseConnection();
   // Base query
   $query = 'SELECT * FROM Items WHERE 1';

   // Apply filters
   if (!empty($filters['price'])) {
       // Filter by price range
       $priceRange = explode('-', $filters['price']);
       $minPrice = intval($priceRange[0]);
       $maxPrice = intval($priceRange[1]);
       $query .= " AND price BETWEEN $minPrice AND $maxPrice";
   }

   if (!empty($filters['category'])) {
       // Filter by category
       $category = $filters['category'];
       $query .= " AND category = '$category'";
   }

   if (!empty($filters['condition'])) {
       // Filter by condition
       $condition = $filters['condition'];
       $query .= " AND condition = '$condition'";
   }

   $stmt = $db->prepare($query);
   $stmt->execute();
   $items = $stmt->fetchAll();

   return $items;
}

function drawItems($items, $menu = false) {

    ?>
    <div class="products">
<?php
    $count = 0;

    foreach ($items as $item) {
        
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
        // Generate a unique identifier for each button
        $button_id = 'buy_btn_' . $item['id'];
        $count++;
        
        if($menu && $count > 8){
            break;
        }


?>

      <div class="card">
        <div class="card_top">
          <img src="<?php echo $main_image;?>" alt="" class="card_img" />
          <button id="<?php echo $button_id; ?>" class="buy_btn">Buy</button>
        </div>
        <div class="card_body">
          <h3 class="card_title"><?php echo $name; ?></h3>
          <p class="card_price">€ <?php echo $price;?></p>
        </div>
      </div>
      <script type="text/javascript">
            document.getElementById("<?php echo $button_id; ?>").onclick = function () {
                location.href = "item.php?id=<?php echo $item['id'];?>";
            };
        </script>
<?php
    }

    ?>
     </div>
<?php
}

function drawFilter(){

?>

<div class="container filter_container">
<p>Filters</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="header_filter">
                <label>Price Range:</label>
                <select name="price">
                    <option value="">Select</option>
                    <option value="0-25">$0 - $25</option>
                    <option value="25-50">$25 - $50</option>
                    <option value="50-100">$50 - $100</option>
                    <option value="100-200">$100 - $200</option>
                    <option value="200-10000000">Above $200</option>
                </select>
            </div>
            <div class="header_filter">
                <label>Category:</label>
                <select name="category">
                    <option value="">Select</option>
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
            <div class="header_filter">
                <label>Condition:</label>
                <select name="condition">
                    <option value="">Select</option>
                    <option value="New">New</option>
                    <option value="Like new">Like New</option>
                    <option value="Used">Used</option>
                    <option value="Fair">Fair</option>
                    <option value="Damaged">Damaged</option>
                </select>
            </div>
            <div class="header_filter" >
                <input type="submit" value="Apply Filters">
            </div>
        </form>
        
  
      </div>

<?php } 



?>