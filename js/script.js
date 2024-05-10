document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('message-form');
    var messageInput = document.getElementById('message-input');
    var chatBox = document.getElementById('chat-box');
  
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var message = messageInput.value.trim();
      if (message !== '') {
        sendMessage(message);
        messageInput.value = '';
      }
    });
  
    function sendMessage(message) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '../pages/send_message.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            console.log("Resposta do servidor:", xhr.responseText); // Para depuração
            var response;
      
            try {
              response = JSON.parse(xhr.responseText); // Tentar fazer o parse da resposta
            } catch (e) {
              console.error("Erro ao fazer o parse da resposta:", e);
              showAlert("Erro ao interpretar a resposta do servidor."); // Mensagem de alerta para o usuário
              return;
            }
      
            if (response.success) {
              updateChat(); // Atualizar o chat se o envio foi bem-sucedido
            } else {
              showAlert(response.error); // Mostrar erro se houver
            }
          } else {
            showAlert('Erro ao enviar a mensagem. Status: ' + xhr.status);
          }
        }
      }
      xhr.onerror = function() {
        showAlert('Erro de rede ao tentar enviar a mensagem.');
      };

      xhr.send('message=' + encodeURIComponent(message)); 
    }
  
    function updateChat() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '../pages/get_messages.php', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          chatBox.innerHTML = xhr.responseText;
          chatBox.scrollTop = chatBox.scrollHeight;
        }
      }
      xhr.send();
    }
  
    // Update chat initially
    updateChat();
  });


  
  function showAlert(message){
    alert(message);
  }

  