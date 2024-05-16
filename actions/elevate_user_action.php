<?php

require_once(__DIR__ . '/../conf.php');
require_once(__DIR__ .'/../utils/session.php');
require_once(__DIR__ .'/../data/connection.php');
include_once(__DIR__ . '/../data/user.php');


$id = $_GET['id'];
$db = getDatabaseConnection();

User::elevateUser($id, $db);

header('Location: ../pages/userlist.php');
exit();

?>