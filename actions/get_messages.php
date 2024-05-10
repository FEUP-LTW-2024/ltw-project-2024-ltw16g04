<?php
require_once(__DIR__ . '/../data/connection.php');
require_once(__DIR__ . '/../utils/session.php'); 

$conn = getDatabaseConnection();

$session = new Session();

$query = "SELECT users.name, messages.message, messages.created_at, messages.from_user, messages.to_user 
        FROM messages 
        JOIN users ON users.id = messages.from_user
        WHERE (messages.from_user = ? AND messages.to_user = ?) or (messages.from_user = ? AND messages.to_user = ?)
        ORDER BY messages.created_at DESC 
        LIMIT 50";

$user_id = $session->getId();
$chatting = $_GET['user_id'];
$stmt = $conn->prepare($query); 
$stmt->execute(array($user_id, $chatting, $chatting, $user_id));

$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($messages) > 0) {
 
  $messages = array_reverse($messages);

  foreach ($messages as $message) {
    $receiver = $message['to_user'];
    $sender = $message['from_user'];
    if($sender == $user_id) {
      echo "<div class='user-message'>";
      echo htmlspecialchars($message['message']);
      echo "</div>";
    }
    else{
      echo "<div class='other-message'>";
      echo htmlspecialchars($message['message']);
      echo "</div>";
    }
  }
} else {
  echo "Nenhuma mensagem encontrada."; 
}
?>
