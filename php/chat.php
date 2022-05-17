<?php 
    session_start();
    
    if(isset($_SESSION['unique_id'])){
        //echo 'true';
        include_once 'config.php';
        $newmsg = mysqli_real_escape_string($conn, $_POST['newmsg']);
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        if($newmsg != ""){
            echo $newmsg;
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                   VALUES ({$incoming_id}, {$outgoing_id}, '{$newmsg}')") or die();
        }
    }else{
        header('../login.php');
    }
?>