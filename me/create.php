<?php 
    session_start();
    include_once "../includes/include.php";
    if(isset($_SESSION['user_id'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Private Diary - Create your diary, signup.</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="signup-hold">
            <h2 class="signup-title">Create your online diary</h2><br>
            <form method="POST">
                <label class="form-label" for="user_name">Your full name</label><br>
                <input type="text" id="user_name" name="user_name" class="form-input" placeholder="Full name" required autofocus>

                <label class="form-label" for="user_email">Your email</label><br>
                <input type="email" id="user_email" name="user_email" class="form-input" placeholder="email@domain.com" required>
                <label class="form-label" for="user_password">Your password</label><br>
                <input type="password" id="user_password" name="user_password" class="form-input" placeholder="********" required>
                <label class="form-label" for="user_password_conf">Confirm your password</label><br>
                <input type="password" id="user_password_conf" name="user_password_conf" class="form-input" placeholder="********" required>
                <button type="submit" name="submit" class="submit-btn">Create!</button>
            </form>
            
            <div class="check-hold">
                <a href="login.php" class="btn">Already have an account?</a><br>
                <?php
                if(isset($_POST['submit'])){
                    $user_name = strip_tags(mysqli_real_escape_string($conn, $_POST['user_name']));
                    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
                    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
                    $user_password_conf = mysqli_real_escape_string($conn, $_POST['user_password_conf']);

                    if(empty($user_name) || empty($user_email) || empty($user_password) || empty($user_password_conf)){
                        echo "<br>Error, empty fields.";
                        exit();
                    }
                    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
                        echo "<br>Error, enter a real email.";
                        exit();
                    }
                    $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        echo "<br>Account already exists";
                        exit();
                    }
                    if($user_password == $user_password_conf){
                        $hash = password_hash($user_password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (`user_name`, `user_email`, `user_password`, `user_role`) VALUES ('$user_name', '$user_email', '$hash', 'user')";
                        if(mysqli_query($conn, $sql)){
                            header("Location: login.php?message=Success, account made.");
                            
                        }else {
                            echo "<br>Query error.";
                        }
                    }else {
                        echo "<br>Error, passwords dont match.";
                        exit();
                    }
                    
                }
            ?>
            </div>
            </div>
        </header>
        
    </body>
</html>