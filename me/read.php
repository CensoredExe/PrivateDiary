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
        <div style="margin-top:5% !important;" class="text-box">
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            <h1>What have you been writing?</h1><br>
            <a href="index.php" class="cta-btn">DASHBOARD</a>
        </div>
        <div class="row">
            <form method="POST" action="search.php">
                
            </form>
        <div style="margin-top: 2% !important;" class="posts-hold">
        
        <?php
        $id = $_SESSION['user_id'];
			//pagination
			$sqlpg = "SELECT * FROM posts WHERE post_author = '$id'";
			$resultpg = mysqli_query($conn, $sqlpg);
			$totalposts = mysqli_num_rows($resultpg);
			$totalpages = ceil($totalposts/2);
		?>
		<?php 
			//pagination get
			if(isset($_GET['p'])){
				$pageid = $_GET['p'];
				$start = ($pageid*2)-2;
				$sql = "SELECT * FROM `posts` WHERE post_author = '$id' ORDER BY post_id DESC LIMIT $start,2";
			}else{
				$sql = "SELECT * FROM `posts` WHERE post_author = '$id' ORDER BY post_id DESC LIMIT 0,2";
            }
            
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $post_id = $row['post_id'];
                $post_date = $row['post_date'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_content = $row['post_content'];
                ?>
                <div class="post-hold">
                    <h3><?php echo $post_title; ?></h3>
                    <p><?php echo $post_date; ?></p>
                    <hr><br>
                    <p><?php echo substr($post_content, 0, 300);echo "..."; ?></p>
                    <br><a href="post.php?id=<?php echo $post_id; ?>" class="btn">Read more.</a>
                </div>
                </div>
                <?php
            }
        ?>
        


        <!-- BUTTONS PAGINATION -->

        
        </div>
        <div class="btns-hold">
        <?php 
				echo "<center>";
				for($i=1;$i<=$totalpages;$i++){
					?>
					<a class="btn btn-page" href="?p=<?php echo $i; ?>"><?php echo $i; ?></a>&nbsp;
					<?php
				}
				echo "</center>";
			?>
        </div>
        
    </header>
</body>
</html>