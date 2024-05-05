
<?php 

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');
require_once(__DIR__ .'/../utils/utils.php');
require_once(__DIR__ .'/../actions/favorites.php');

addFavorite();

$session = new Session();
$item_id = $session->getItemId();
header('Location: ../pages/item.php?id='.$item_id);
exit();

?>