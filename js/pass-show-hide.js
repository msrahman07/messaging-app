$(document).ready(function(){
    // $(".form input[type='password']").click(function(){
    //   $("#para").hide();
    // });
    const pswrdField = $(".form input[type='password']");
    
    $(".form .field i").click(function(){
        console.log($(".form .field i").attr("class"));
        if(pswrdField[0]['type'] == "password"){
            pswrdField[0]['type'] = "text";
            $(".form .field i")[0].className = "fas fa-eye fa-sm";
        }else {
            pswrdField[0]['type'] = "password";
            $(".form .field i")[0].className = "fas fa-eye-slash fa-sm";
        }
    })
  });