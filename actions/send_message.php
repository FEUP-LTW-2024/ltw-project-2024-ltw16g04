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
$chatting = $_POST['user_id'];
$message = $comment = preg_replace("/[^a-zA-Z\s]/", '', trim($_POST['message']));
$timestamp = date('Y-m-d H:i:s');

$countMessages = 'SELECT COUNT(*) as count FROM Messages';
$stmt = $conn->prepare($countMessages);
$stmt->execute();
$num = $stmt->fetch();
$id = $num['count'] + 1;

if (empty($message)) {
  http_response_code(400);
  echo "A mensagem não pode estar vazia.";
  exit();
}

$query = "INSERT INTO messages (id,from_user, to_user, message, created_at) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt->execute(array($id,$user_id, $chatting, $message, $timestamp))) {
  http_response_code(200);
  echo json_encode(["success" => true, "message" => "Mensagem enviada com sucesso."]);
} else {
  http_response_code(500);
  echo json_encode(["error" => "Erro ao enviar a mensagem."]);
}

?>
