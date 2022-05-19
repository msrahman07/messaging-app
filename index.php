<?php 
    include_once 'header.php';
    session_start();
    if(isset($_SESSION['unique_id'])){
        header('location: users.php');
    }
?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header> Chat App</header>
            <form id="signupForm" action="php/signup.php" method="POST" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input id="fName" name="fname" type="text" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input id="lName" name="lname" type="text" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input id="email" name="email" type="text" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <div class="pass">
                        <input id="password" name="password" type="password" placeholder="Enter your password" required>
                        <i class="fas fa-eye-slash fa-sm"></i>
                    </div>
                </div>
                <div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image" id="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
                <div class="link">Already signed up? <a href="#">Login now</a></div>
            </form>
            <form id="demo" action="php/demo.php" method="post">
                <div class="field button">
                    <input type="submit" value="Demo the app">
                </div>
            </form>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>
    <script src="js/demo.js"></script>
</body>

</html>