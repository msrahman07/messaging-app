$(document).ready(function() {
    $('#searchBar').submit((e)=>{
        e.preventDefault();
    });
    $('#searchBar').keyup((e)=>{
        let formData = new FormData($('#searchBar')[0]);
        // console.log(formData);

        $.ajax({
            method: "POST",
            url: "php/search.php",
            contentType: "application/x-www-form-urlencoded",
            data: formData,
            processData: false,
            contentType: false,
            success: (data, status)=> {
                if(status === "success"){
                    $('.users-list').html(data);
                    
                    //console.log(data);
                    // if(data === "success"){
                    //     console.log("hi hello")
                    // }else{
                        
                    // }
                    // console.log(data);
                }
            }
        });
    });
   
    setInterval(() => {
        $.ajax({
            method: "GET",
            url: "php/users.php",
            //data: {},
            processData: false,
            contentType: false,
            success: (data, status)=> {
                if(status === "success"){
                    if($('#searchTerm').val() == ""){
                        $('.users-list').html(data);
                    }
                    
                }
            }
        });
   }, 500); 
});