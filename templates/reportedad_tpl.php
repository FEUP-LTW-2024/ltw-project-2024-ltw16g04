<?php 

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');


function drawReportedAds(){

    require_once(__DIR__ . '/../data/item.php');
    $session = new Session();
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM REPORT_ITEM';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $reported_ads = $stmt->fetchAll();

?>

<section class="section">
  <div class="container">


    <div class="products">
    <?php 
    if(!$reported_ads){
        echo '<p>There are no reports.</p>';
    }
    
    foreach($reported_ads as $report){ 
            $item = Item::findItem($report['item_id'], $db);
            $name = $item->name;
            $price = $item->price;
            $img = $item->main_image; 
            $buy_button_id = 'buy_btn_' . $item->id;

            ?>
      <div class="card">
        <div class="card_content">
        <div class="card_top">
          <img src="<?php echo $img;?>" alt="" class="card_img" />
          
        </div>
        <div class="card_body">
          <h2 class="card_title">#<?php echo $report['item_id'];?></h2>
          <div class="report-description">
          <p id="description"><?php echo $report['description'];?></p></div>
          <button id="<?php echo $buy_button_id; ?>" class="buy_btn">Delete Ad</button>
          <script type="text/javascript">
            document.getElementById("<?php echo $buy_button_id;?>").onclick = function () {
            location.href = "../actions/delete_btn_action.php?id=<?php echo $item->id;?>";
            };
          </script>
        </div>
        </div>
      </div>
      </div>
      </div>
      <?php } ?>
      </div>
    </div>
</section>

<?php } ?>