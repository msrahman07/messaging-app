$(document).ready(function() {
    $(".login form").submit((e)=> {
        e.preventDefault();
    });
    $(".login form").children(".button").children("input").click( () => {
        let formData = new FormData($(".login form")[0]);
        $.ajax({
            method: "POST",
            url: "php/login.php",
            data: formData,
            processData: false,
            contentType: false,
            success: (data, status)=> {
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
});