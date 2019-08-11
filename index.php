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
            <nav>
                <div class="row">
                    <div class="logo-hold">
                        <a class="logo" href="#">PrivateDiary.me</a>
                    </div>
                    <ul class="items-hold">

                    <?php
                    if(isset($_SESSION['user_id'])){
                        ?>
                            <li class="nav-item"><a class="nav-a nav-main" href="me/">DASHBOARD</a></li>
                            <li class="nav-item"><a class="nav-a" href="me/help.php">Help</a></li>
                            <li class="nav-item"><a class="nav-a" href="me/logout.php">Log out</a></li>

                        <?php
                    }else {
                        ?>
                        <li class="nav-item"><a class="nav-a nav-main" href="me/create.php">CREATE A DIARY</a></li>
                        <li class="nav-item"><a class="nav-a" href="me/help.php">Help</a></li>
                        <li class="nav-item"><a class="nav-a" href="me/login.php">Log in</a></li>

                        <?php
                    }
                    ?>
                       
                    </ul>
                </div>
            </nav>
            <div class="text-box">
                <h1>Keep a personal,<br>private diary - online.</h1>
                
                <?php
                    if(isset($_SESSION['user_name'])){
                        ?>
                        <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
                        <?php
                    }
                ?>
<br>
<br>
                <?php
                    if(isset($_SESSION['user_name'])){
                        ?>
                            <a class="cta-btn" href="me/">DASHBOARD</a>

                        <?php
                    }else {
                        ?>
                        
                        <a class="cta-btn" href="me/create.php">CREATE A DIARY</a>
                        <?php
                    }

                ?>
                <a class="cta-sub-btn" href="#">SEE MORE</a>
            </div>
        </header>
        <br><br>
    </body>
</html>