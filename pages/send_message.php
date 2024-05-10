<?php
require_once(__DIR__ . '/../data/connection.php'); // Função para obter conexão com o banco de dados
require_once(__DIR__ . '/../utils/session.php'); // Para verificar sessão

$session = new Session();

// Verifica se o usuário está logado
if (!$session->isLoggedIn()) {
  http_response_code(403); // Acesso proibido
  echo "Você precisa estar logado para enviar mensagens.";
  exit();
}

// Obtemos o ID do usuário logado
$user_id = $session->getUserId(); 
$message = trim($_POST['message']); // Mensagem enviada pelo cliente
$timestamp = time(); // Tempo atual em segundos desde a época Unix

// Se a mensagem estiver vazia, não fazemos nada
if (empty($message)) {
  http_response_code(400); // Pedido ruim
  echo "A mensagem não pode estar vazia.";
  exit();
}

$conn = getConnection(); // Obter a conexão com o banco de dados

$sql = "INSERT INTO messages (user_id, message, timestamp) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql); // Prepara a query SQL
$stmt->bind_param("iss", $user_id, $message, $timestamp); // Vincula os parâmetros

// Executa a query e verifica se foi bem-sucedida
if ($stmt->execute()) {
  http_response_code(200); // OK
  echo "Mensagem enviada com sucesso.";
} else {
  http_response_code(500); // Erro interno do servidor
  echo "Erro ao enviar a mensagem.";
}

$stmt->close(); // Fechar o statement
$conn->close(); // Fechar a conexão
?>
