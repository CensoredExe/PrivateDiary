<?php 
    session_start();
    
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
                <label class="form-label" for="user_fname">Your full name</label><br>
                <input type="text" id="user_fname" name="user_fname" class="form-input" placeholder="Full name" required autofocus>
                <label class="form-label" for="user_name">Your username</label><br>
                <input type="text" id="user_name" name="user_name" class="form-input" placeholder="username" required>
                <label class="form-label" for="user_email">Your email</label><br>
                <input type="email" id="user_email" name="user_email" class="form-input" placeholder="email@domain.com" required>
                <label class="form-label" for="user_password">Your password</label><br>
                <input type="password" id="user_password" name="user_password" class="form-input" placeholder="********" required>
                <label class="form-label" for="user_password_conf">Confirm your password</label><br>
                <input type="password" id="user_password_conf" name="user_password_conf" class="form-input" placeholder="********" required>
                <button type="submit" name="submit" class="submit-btn">Create!</button>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    
                }
            ?>
            <div class="check-hold">
                <a href="#" class="btn">Already have an account?</a>
                
            </div>
            </div>
        </header>
        
    </body>
</html>