<?php 
    session_start();
    include "config.php";

    $sql = mysqli_query($conn, "SELECT * FROM users");
    if(mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];
        mysqli_query($conn, "UPDATE users
                SET status = 'Active now'
                WHERE unique_id = {$row['unique_id']};");
        echo "success";
    }else{
        echo "No users in db!";
    }
?>