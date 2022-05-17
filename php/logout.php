<?php
    session_start();
    include_once 'config.php';
    $user = mysqli_real_escape_string($conn, $_GET['user_id']);
    mysqli_query($conn, "UPDATE users
                        SET status = 'Offline now'
                        WHERE unique_id = {$user};");
    header('location: ../login.php');
    session_destroy();
?>