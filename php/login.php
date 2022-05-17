<?php 
    session_start();
    include "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
            if(mysqli_num_rows($sql) == 1) {
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['unique_id'] = $row['unique_id'];
                mysqli_query($conn, "UPDATE users
                        SET status = 'Active now'
                        WHERE unique_id = {$row['unique_id']};");
                echo "success";
            }else{
                echo "Incorred email/passowrd!";
            }
        }else {
            echo "Please enter valid email!";
        }
        
    }else{
        echo "All input fields are required";
    }

?>