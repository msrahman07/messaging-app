const chatbox = document.querySelector('.chat-box');
scrollBottom = ()=> {
    chatbox.scrollTop = chatbox.scrollHeight;
}
$(document).ready(function() {
    // window.scrollTo(0,document.body.scrollcontent);
    $(".typing-area").submit((e)=> {
        e.preventDefault();
        let formData = new FormData($(".typing-area")[0]);
        $.ajax({
            method: "POST",
            url: "php/chat.php",
            data: formData,
            processData: false,
            contentType: false,
            success: (data, status)=> {
                if(status === "success"){
                    // scrollBottom();
                }
            }
        });
        $("#newmsg").val("");
    });
    let currConvoLen = 0;
    let windHeight = 500;    
    setInterval(()=> {
        let formData = new FormData($(".typing-area")[0]);
        $.ajax({
            method: "POST",
            url: "php/getchat.php",
            data: formData,
            processData: false,
            contentType: false,
            success: (data, status)=> {
                if(status === "success"){
                    let newConvoLen = data.length;
                    // console.log(data);
                    if(newConvoLen > currConvoLen){
                        //console.log($.parseHTML(data).height());
                        // scrollBottom();
                        windHeight += data.length;
                        $('.chat-box').html(data);
                        $('.chat-box').scrollTop(windHeight);
                        //console.log(data.length);//$('.outgoing').height() + $('.incoming').height());

                        currConvoLen = newConvoLen;
                    }
                    
                }
            }
        });
    //console.log($('.outgoing').height() + $('.incoming').height());
    },200);
});