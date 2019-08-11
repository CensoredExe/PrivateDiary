<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }else {
        ?>
            <p>Your logged in, hello <?php echo $_SESSION['user_name']; ?></p>
            <a href="logout.php">Logout</a>
        <?php
    }
?>