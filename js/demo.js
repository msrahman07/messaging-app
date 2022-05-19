$(document).ready(function () {
    $('#demo').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: 'php/demo.php',
            success: function (data, status){
                if(status === "success"){
                    if(data === "success"){
                        location.href = "users.php";
                        // $(".error-txt").text("Login Successfull");
                        // $(".error-txt").css({'display':'block', 'background-color':'#dbf8db'});
                        console.log("login successfull");
                    }else{
                        $(".error-txt").text(data);
                        $(".error-txt").css('display','block');
                    }
                }
            }
        });
    });
})