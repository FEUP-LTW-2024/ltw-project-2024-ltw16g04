<?php
  require_once(__DIR__ . '/../templates/common_tpl.php');
  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../data/connection.php');
  require_once(__DIR__ . '/../data/user.php');


  $session = new Session;
  $conn = getDatabaseConnection();
  $user_id = $session->getId();
  
  $seller_id = $_GET['seller_id'];
  $timestamp = date('Y-m-d H:i:s');

  $countMessages = 'SELECT COUNT(*) as count FROM Messages';
  $stmt = $conn->prepare($countMessages);
  $stmt->execute();
  $num = $stmt->fetch();
  $id = $num['count'] + 1;



  if($seller_id){
    $query = "INSERT INTO messages (id,from_user, to_user, message, created_at) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($id,$user_id, $seller_id, "Olá, quero saber mais sobre o produto.", $timestamp));
  }
  
  if(!$session->isLoggedIn()) {
    $session->addMessage('error', 'Please log in to access this page.');
    header('Location: login.php');
    exit();
  }

  $query = "SELECT users.id, users.name
          FROM users
          WHERE users.id IN (
              SELECT DISTINCT from_user FROM messages WHERE to_user = ? 
              UNION
              SELECT DISTINCT to_user FROM messages WHERE from_user = ?
          ) AND users.id != ?";
          
  $stmt = $conn->prepare($query); 
  $stmt->execute(array($user_id, $user_id, $user_id));

  $chats = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Martech</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/chat.css" rel="stylesheet">
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
  
  <?php drawHeader(); ?>


  <!--MAIN-->
  <section class="section">
    <div class="container">
        <p>Chats</p>
    <div class="container chats_container">
    
      <div class="chat_form">
        <div class="profile">
        <img src="../images/user.png" alt="" class="profile-pic">
        <p><?php echo 
      $session->getName();
      ?></p></div>
        <ul class="user-chats" id="chat-container">
        <?php foreach ($chats as $chat): ?>
          <li data-user-id="<?php echo htmlspecialchars($chat['id']); ?>"><div class="profile-chat">
            <img src="../images/user.png" alt="" class="profile-chat-pic">
            <p><?php echo htmlspecialchars($chat['name']); ?></p></div></li>
            <?php endforeach; ?>
        </ul>
      </div>
      <div class="messages">
        <div class="profile">
          <img src="../images/user.png" alt="" class="profile-pic">
          <div class="username-status">
          <p id="chatting-with">Username</p>
          <p id="status">Active Now</p>
        </div>
        </div>
     
        <div class="chat-container">
          <div id="chat-box"></div>
          <form id="message-form">
      
            <input type="text" id="message-input" placeholder="Type your message...">
            <button type="submit">Send</button>
          </form>
        </div>
        <script src="../js/script.js"></script>
      </div>
      </div>

      
      </div>
    </section>
    

 <!--FOOTER-->
  <?php drawFooter(); ?>
</body>

</html>