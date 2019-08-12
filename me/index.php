<?php
    session_start();
    include_once "../includes/include.php";
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
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            <h1>What do you want to do today?</h1><br>
            <a href="write.php" class="cta-btn">WRITE</a>
            <a href="read.php" class="cta-sub-btn">READ</a>

        </div>

        <?php
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM posts WHERE post_author='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $sql = "SELECT * FROM posts WHERE post_author='$id' ORDER BY post_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_content = $row['post_content'];
            
            ?>
            <div class="row">
            <div class="posts-hold">
                <h3>Your most recent post</h3>
                <div class="post-hold">
                    <h3><?php echo $post_title; ?></h3>
                </div>
            </div>
        </div>
            <?php
            }
        }
        ?>
        
    </header>
</body>
</html>