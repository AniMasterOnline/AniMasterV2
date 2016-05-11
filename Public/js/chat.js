$(window).load(function() {
    //Autoscroll chat to bottom on load
    var d = $('#chat-container');
    d.mCustomScrollbar('scrollTo','last');
});
$(document).ready(function() {
    console.log('Chat');
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
});

function Chat () {
    this.update = updateChat;
    this.send = sendChat;
    this.getState = getStateOfChat;
}

//gets the state of the chat
function getStateOfChat() {
    if(!instanse){
        instanse = true;
        $.ajax({
            type: "POST",
            url: "../../System/Partida_Chat.php",
            data: {'function': 'getState', 'file': file},
            dataType: "json",	
            success: function(data) {state = data.state;instanse = false;}
        });
    }	
}

//Updates the chat
function updateChat() {
    if(!instanse){
        instanse = true;
        $.ajax({
            type: "POST",
            url: "../../System/Partida_Chat.php",
            data: {'function': 'update','state': state,'file': file},
            dataType: "json",
            success: function(data) {
                console.log(data);
                if(data.text){
                    for (var i = 0; i < data.text.length; i++) {
                        var content = $('#chat-container').html();
                        $('#chat-container').empty();
                        $('#chat-container').html(content +' '+data.text[i]);
                    }	
                }
                document.getElementById('#chat-container').scrollTop = document.getElementById('#chat-container').scrollHeight;
		instanse = false;
                state = data.state;
            }
        });
    }
    else {
        setTimeout(updateChat, 1500);
    }
}

//send the message
function sendChat(message, nickname) { 
    updateChat();
    $.ajax({
        type: "POST",
        url: "../../System/Partida_Chat.php",
        data: {'function': 'send','message': message,'nickname': nickname,'file': file},
        dataType: "json",
        success: function(data){
            updateChat();
        }
    });
}
