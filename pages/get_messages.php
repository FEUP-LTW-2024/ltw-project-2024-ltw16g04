<?php
require_once(__DIR__ . '/../data/connection.php');
require_once(__DIR__ . '/../utils/session.php'); 

$conn = getDatabaseConnection();


$query = "SELECT users.name, messages.message, messages.created_at 
        FROM messages 
        JOIN users ON users.id = messages.from_user 
        ORDER BY messages.created_at DESC 
        LIMIT 50";

$stmt = $conn->prepare($query); // Preparar a query
$stmt->execute(); // Executar a query

$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($messages) > 0) {
  // Reverter para ordem cronológica
  $messages = array_reverse($messages);

  foreach ($messages as $message) {
    echo "<div class='message'>";
    echo htmlspecialchars($message['message']);
    echo "</div>";
  }
} else {
  echo "Nenhuma mensagem encontrada."; 
}
?>
