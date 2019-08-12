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

    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: '#post_content'
  });
  </script>

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
        <div class="write-hold">
            <h2 class="signup-title">Make a new post</h2>
            <br>
            <form method="POST">
            <label for="post_title" class="form-label">Post title</label><br>
            <input class="form-input" id="post_title" name="post_title" required autofocus><br>
            <label for="post_content" class="form-label">Post content</label><br>
            <textarea id="post_content" name="post_content" required>

            </textarea><br>
            <button type="submit" name="submit" class="submit-btn">Post privately</button>
            </form>
            <?php 
                if(isset($_POST['submit'])){
                    $post_title = strip_tags(mysqli_real_escape_string($conn, $_POST['post_title']));
                    $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);

                    
                    $post_author = $_SESSION['user_id'];
                    date_default_timezone_set('Europe/London');
                    $post_date = date("d-m-Y H:i:s");  

                    if(empty($post_title) || empty($post_content)){
                        echo "Empty fields.";
                        exit();
                    }

                    $sql = "INSERT INTO posts (`post_title`, `post_content`, `post_author`, `post_date`) VALUES ('$post_title', '$post_content', '$post_author', '$post_date');";
                    if(mysqli_query($conn,$sql)){
                        header("Location: read.php?Post added");
                        exit();
                    }
                }

            ?>
        </div>
    </header>

</body>
</html>