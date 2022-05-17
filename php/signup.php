<?php 
    session_start();
    include "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // $checkEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
            // $checkEmail->bind_param('s', $email);
            // $checkEmail->execute();
            $checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($checkEmail) > 0){
                echo "$email - already exists";
            }else {
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpg', 'jpeg'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        $target_file = 'images/' . $new_img_name;
                        if(move_uploaded_file($tmp_name, $target_file)){
                            $status = "Active now";
                            $random_id = rand(time(), 1000000);
                            $sqlAddUser = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                            VALUES ({$random_id}, '{$fname}','{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            // $sqlAddUser = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES (123, sakib, raka, email@email.com, 123, sadasd, blah)");
                            
                            if($sqlAddUser){
                                $sqlCheckUser = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sqlCheckUser) > 0){
                                    $row = mysqli_fetch_assoc($sqlCheckUser);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }else{
                                echo "Something went wrong! ";
                            }
                        } else {
                            echo "Something went wrong!: ".$tmp_name;
                        }
                    }else {
                        echo "Please select a valid Image file - jpeg, jpg, png!";
                    }
                }else {
                    echo "Please select an Image file!";
                }
            }
        }else{
            echo $email." this is not a valid email address";
        }
    }else{
        echo "All input fields are required";
    }
?>