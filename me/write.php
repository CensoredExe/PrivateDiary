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

    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
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
            <label for="post-title" class="form-label">Post title</label><br>
            <input class="form-input" id="post-title" name="post-title" required autofocus><br>
            <label for="post-content" class="form-label">Post title</label><br>
            <textarea id="mytextarea" required></textarea><br>
            <button type="submit" class="submit-btn">Post privately</button>
            </form>
        </div>
    </header>

</body>
</html>