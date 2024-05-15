document.addEventListener('DOMContentLoaded', function() {
  //função 1
    const { form, messageInput, chatBox ,userChats, profileName} = getDOMElements();

    let activeChatUserId = null;
    let activeChatUserName = null;
    //end of função 1

    //função 2
    userChats.addEventListener('click', function(event) {
      console.log('Clique detectado em:', event.target);
      const chatItem = event.target.closest('li[data-user-id]');
      if (chatItem) {
        activeChatUserId = chatItem.getAttribute('data-user-id');
        activeChatUserName = chatItem.querySelector('p').textContent;
        updateProfile(activeChatUserName);
        updateChat();
      }
    });
    //end of função 2

    //função 3
    urlChatHandler();
    //end of função 3
  
    //função 4
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const message = messageInput.value.trim();
      if (message !== '' && activeChatUserId) {
        sendMessage(message);
        messageInput.value = '';
      }
      else if (!activeChatUserId) {
        showAlert("Por favor, selecione um chat.");
      }
    });
    //end of função 4
    
    //função 5
    function sendMessage(message) {
      if (!activeChatUserId) {
        showAlert("Nenhum chat ativo.");
        return;
      }
      const params = 'user_id=' + encodeURIComponent(activeChatUserId) + '&message=' + encodeURIComponent(message);
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../actions/send_message.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            console.log("Resposta do servidor:", xhr.responseText); // Para depuração
            let response;
      
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

      xhr.send(params); 
    }
    //end of função 5

    //função 6
    function updateChat() {
      
      const xhr = new XMLHttpRequest();
      xhr.open('GET', `../actions/get_messages.php?user_id=${encodeURIComponent(activeChatUserId)}`, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          
          chatBox.innerHTML = xhr.responseText;
          chatBox.scrollTop = chatBox.scrollHeight;
        }
      }
      xhr.send();
    }
    //end of função 6

    //função 7
    function updateProfile(username) {
      profileName.textContent = username;
  }
    // Update chat initially
    updateChat();
  });

  function getDOMElements() {
    return {
        form: document.getElementById('message-form'),
        messageInput: document.getElementById('message-input'),
        chatBox: document.getElementById('chat-box'),
        userChats: document.getElementById('chat-container'),
        profileName: document.getElementById('chatting-with')
    };
}


function urlChatHandler(){
    const url = new URL(window.location.href);

    const params = new URLSearchParams(url.search);
    let userMatched = false;      
    const myParam = params.get('seller_id'); 

    document.querySelectorAll(".user-chats li").forEach(x => {if(x.dataset.userId == myParam){
        x.click();
        userMatched = true;
    }})
    if(!userMatched){
      document.querySelectorAll(".user-chats li").forEach(x => {x.click();});
    };
  }