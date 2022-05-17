<?php 
    session_start();
    include_once 'config.php';
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id <> {$outgoing_id}");//WHERE NOT unique_id = {$outgoing_id}
    $output = "";
    if(mysqli_num_rows($sql) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
    //$row = mysqli_fetch_array($sql,MYSQLI_NUM);
    //echo $row;
?>