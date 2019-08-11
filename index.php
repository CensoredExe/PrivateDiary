<?php 
    session_start();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Private Diary - Keep a personal, completely private diary for yourself.</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="text-box">
                <h1>Keep a personal,<br>private diary - online.</h1>
                <a class="cta-sub-btn" href="#">SEE MORE</a>
                <?php
                    if(isset($_SESSION['user_name'])){

                    }else {
                        ?>
                        
                        <a class="cta-btn" href="me/create.php">CREATE A DIARY</a>
                        <?php
                    }

                ?>
            </div>
        </header>
        <br><br>
    </body>
</html>