<?php
require_once(__DIR__ . '/../data/connection.php');
require_once(__DIR__ . '/../utils/session.php'); 

$session = new Session();
$conn = getDatabaseConnection();

if (!$session->isLoggedIn()) {
  http_response_code(403);
  echo "Você precisa estar logado para enviar mensagens.";
  exit();
}


$user_id = $session->getId();
$message = trim($_POST['message']);
$timestamp = date('Y-m-d H:i:s');

$countMessages = 'SELECT COUNT(*) as count FROM Messages';
$stmt = $conn->prepare($countMessages);
$stmt->execute();
$num = $stmt->fetch();
$id = $num['count'] + 1;
echo $id;

if (empty($message)) {
  http_response_code(400);
  echo "A mensagem não pode estar vazia.";
  exit();
}

$query = "INSERT INTO messages (id,from_user, message, created_at) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt->execute(array($id,$user_id, $message, $timestamp))) {
  http_response_code(200);
  echo "Mensagem enviada com sucesso.";
} else {
  http_response_code(500);
  echo "Erro ao enviar a mensagem.";
}

?>
