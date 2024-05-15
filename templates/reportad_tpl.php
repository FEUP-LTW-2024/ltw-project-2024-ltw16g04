<?php
function drawReportAd($item_id){
 

  require_once(__DIR__ .'/../data/connection.php');
  require_once(__DIR__ .'/../data/item.php');
  require_once(__DIR__ .'/../templates/common_tpl.php');
  require_once(__DIR__ .'/../utils/session.php');

  $session = new Session();
  if(!$session->isLoggedIn()) {header('Location: ../pages/login.php');
  exit();}
?>

<section class="section">
    <div class="container">
        <p>Report an Ad</p>
    <div class="container report_container">
    
      <div class="report_form">
        <p>
Thank you for bringing this to our attention. We apologize for any inconvenience caused by the ad. Understanding your reasons for reporting it will help us improve our services. Please provide details on why you found the ad problematic, and we'll take appropriate action. Your feedback is valuable to us!</p>
            <form action="../actions/reportAd_action.php" method="post" enctype="multipart/form-data">
                
                 
                  <div class="description">
                      <textarea id="description" name="description" rows="10" cols="50" placeholder="Enter your description here..."></textarea>
                  </div>

                  
                  <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">

                <div class="buttons">
                  <button id="place_order" name="report_ad">Report ad</button>
                  <button id="go_back" name="go_back">Go back</button>
                </div>
              </form>
      </div>
      </div>
      </div>
    </section>

<?php } ?>