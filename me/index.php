<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
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
                    <a class="logo" href="../">PrivateDiary.me</a>
                </div>
                <ul class="items-hold">
                <li class="nav-item"><a class="nav-a nav-main" href="index.php">DASHBOARD</a></li>

                    <li class="nav-item"><a class="nav-a" href="help.php">Help</a></li>
                    <li class="nav-item"><a class="nav-a" href="logout.php">Log out</a></li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="text-box">
            <h1>What do you want to do today?</h1><br>
            <a href="write.php" class="cta-btn">WRITE</a>
            <a href="read.php" class="cta-sub-btn">READ</a>

        </div>
    </header>
</body>
</html>