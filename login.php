<?php 
    include_once 'header.php';
    session_start();
    if(isset($_SESSION['unique_id'])){
        header('location: users.php');
    }
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header> Chat App</header>
            <form action="#">
                <div class="error-txt">This is an error message!</div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input id="email" name="email" type="text" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <div class="pass">
                        <input id="password" name="password" type="password" placeholder="Enter your password">
                        <i class="fas fa-eye-slash fa-sm"></i>
                    </div>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
                <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
            </form>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>

</body>

</html>