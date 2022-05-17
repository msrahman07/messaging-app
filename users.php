<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header('location: login.php');
    }
?>

<?php 
    include_once 'header.php';
?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php 
                    include_once 'php/config.php';
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="content">
                    <img src=<?php echo "php/images/".$row['img']; ?> alt="">
                    <div class="details">
                        <span><?php echo $row['fname']." ".$row['lname'];?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?user_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <form id="searchBar" action="">
                    <span class="text">Select an user to start chat</span>
                    <input id='searchTerm' name='searchTerm' type="text" placeholder="Enter name to search...">
                    <button type="submit"><i class="fas fa-search fa-sm"></i></button>
                </form>
                
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
</body>
<script src="js/users.js"></script>

</html>