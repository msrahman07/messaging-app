<?php 
    $conn = mysqli_connect("localhost","phpmyadmin","root", "chatApp");
    if(!$conn){
        echo "Connection failed ". mysqli_connect_error();
    }
?>