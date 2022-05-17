const form = $(".signup form");
console.log(form.children(".button").children());
// const continueBtn = $(form.())

$(document).ready(function() {
    $(".signup form").submit((e)=> {
        e.preventDefault();
    });
    $(".signup form").children(".button").children("input").click( () => {
        //console.log($("#fName").val());
        // console.log($("#image").prop("files")[0]);
        //let formData = $(".signup form").serialize();
        let formData = new FormData($(".signup form")[0]);
        //console.log($("#fName").val());
        //formData.append('image', $("#image").prop("files")[0]);
        
        //console.log(formData.get('image'));
        // $.post("php/signup.php", {
        //     fname: formData.get('fname'),
        //     lname: formData.get('lname'),
        //     email: formData.get('email'),
        //     password: formData.get('password'),
        //     image: formData.get('image'),
        //     // image : formData['image']
        // },
        // (data, status)=> {
        //     if(status === "success"){
        //         console.log("here fname: "+data);
        //     }
        // });
        $.ajax({
            method: "POST",
            url: "php/signup.php",
            data: formData,
            processData: false,
            contentType: false,
            success: (data, status)=> {
                if(status === "success"){
                    if(data === "success"){
                        console.log("going");
                        location.href = "users.php";
                    }else{
                        $(".error-txt").text(data);
                        $(".error-txt").css('display','block');
                    }
                }
            }
        });
    });
});