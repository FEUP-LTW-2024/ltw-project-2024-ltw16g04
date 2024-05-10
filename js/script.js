document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('message-form');
    var messageInput = document.getElementById('message-input');
    var chatBox = document.getElementById('chat-box');
    var userChats = document.getElementById('chat-container');

    var activeChatUserId = null;

    userChats.addEventListener('click', function(event) {
      console.log('Clique detectado em:', event.target);
      var chatItem = event.target.closest('li[data-user-id]');
      if (chatItem) {
        activeChatUserId = chatItem.getAttribute('data-user-id');
        updateChat();
      }
    });

    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var message = messageInput.value.trim();
      if (message !== '' && activeChatUserId) {
        sendMessage(message);
        messageInput.value = '';
      }
      else if (!activeChatUserId) {
        showAlert("Por favor, selecione um chat.");
      }
    });
  
    function sendMessage(message) {
      if (!activeChatUserId) {
        showAlert("Nenhum chat ativo.");
        return;
      }

      var xhr = new XMLHttpRequest();
      xhr.open('POST', '../actions/send_message.php', true);
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
      xhr.open('GET', '../actions/get_messages.php', true);
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

  