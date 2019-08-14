<?php
    session_start();
    include_once "../includes/include.php";
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
    if(!isset($_GET['id'])){
        echo "<script>window.location = 'index.php'</script>";
        exit();
    }
    $id = mysqli_real_escape_string($conn, $_GET['id']);
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
       
        <?php
        $user_id = $_SESSION['user_id'];
        
        $sql = "SELECT * FROM posts WHERE post_id = '$id' AND post_author = '$user_id'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_assoc($result)){
                $post_id = $row['post_id'];
                $post_date = $row['post_date'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_content = $row['post_content'];
                ?>
                <div style="margin-top: 10%;" class="row">
                    <div class="full-post-hold">
                        <a href="delete.php?id=<?php echo $post_id; ?>" style="position:absolute;top:10px;right:15px;" class="btn">DELETE</a>
                    <h3 style="color:#000;"><?php echo $post_title; ?></h3>
                    <p><?php echo $post_date; ?></p>
                    <hr><br>
                    <p style="line-height:1.2;"><?php echo $post_content; ?></p>
                    <a style="position:absolute;bottom:10px;left:15px;" href="read.php" class="btn">Back</a>
                    </div>
                    
                </div>
                
                <?php
            }
        }else {
            ?>
            <h1 style="margin-top: 10%;
            color: #fff;margin-left: 10%;">Error: Post doesnt exist</h1><br>
            <a style="margin-left:10%;font-size:30px;" href="read.php" class="btn">Go back</a>
            <?php
        }

        ?>
        
    </header>
</body>
</html>