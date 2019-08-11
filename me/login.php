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
            <h2 class="signup-title">Login to your online diary</h2><br>
            <form method="POST">
                

                <label class="form-label" for="user_email">Your email</label><br>
                <input type="email" id="user_email" name="user_email" class="form-input" placeholder="email@domain.com" required>
                <label class="form-label" for="user_password">Your password</label><br>
                <input type="password" id="user_password" name="user_password" class="form-input" placeholder="********" required>
                <button type="submit" name="submit" class="submit-btn">Get writing!</button>
            </form>
           
            <div class="check-hold">
                <a href="create.php" class="btn">Dont have an account?</a><br>
                <?php
                if(isset($_POST['submit'])){
                    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
                    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

                    if(empty($user_email) || empty($user_password)){
                        echo "Empty fields";
                        exit();
                    }
                    $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) != 1){
                        echo "<br>Account doesnt exist, <a href='create.php' class='btn'>Create one?</a>";
                        exit();
                    }else if(mysqli_num_rows($result) == 1){
                        while($row = mysqli_fetch_assoc($result)){
                            if(password_verify($user_password, $row['user_password'])){
                                $_SESSION['user_id'] = $row['user_id'];
                                $_SESSION['user_name'] = $row['user_name'];
                                $_SESSION['user_email'] = $row['user_email'];
                                $_SESSION['user_role'] = $row['user_role'];
                                header("Location: index.php");
                                exit();
                            }else {
                                echo "<br>Passwords dont match";
                            }
                        }
                    }else {
                        echo "<br>Error, more than one account with that email. Email support.";
                        exit();
                    }
                
                }
            ?>
            </div>
            </div>
        </header>
        
    </body>
</html>