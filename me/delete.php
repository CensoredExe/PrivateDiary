<?php

    if(isset($_GET['id'])){
        session_start();
        include_once "../includes/include.php";
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM posts WHERE post_id='$id' AND post_author = '$user_id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            $sql = "DELETE FROM posts WHERE post_id='$id'";
            if(mysqli_query($conn, $sql)){
                echo "<script>window.location = 'read.php'</script>";
                exit();
            }else {
                echo "Error";
            }
        }else {
            echo "Dont try and delete others posts.";
            exit();
        }
    }

?>