<?php
    include("include/config.php");
    session_start();
    if (empty($_SESSION['firstName'])) {
        header("location: index.php");
    }
    $like = $_POST['liked'];
    $id = $_SESSION["post_id"];
    $username = $_SESSION['username'];
    $comment = $_POST['comment'];
    $commentNum = $_POST['submitComment'];
    $delete = $_POST['delete'];
    $deletePost = $_POST['deletePost'];
    $likeDisplay = $_POST['likedDisplay'];
    $commentDisplay = $_POST['commentDisplay'];
    $commentNumDisplay = $_POST['submitCommentDisplay'];
    $deleteDisplay = $_POST['deleteDisplay'];
    $deletePostDisplay = $_POST['deletePostDisplay'];

    if ($like != "") {
        $sql = "UPDATE posts SET liked = '1' WHERE id = '$like' ";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT num_of_likes FROM posts WHERE id = '$like'";
            $result = $conn->query($sql2);
                while ($row = $result->fetch_assoc()) {
                    $likes = $row["num_of_likes"];
                    $likes++;
                    $sql3 = "UPDATE posts SET num_of_likes = '$likes' WHERE id = '$like'";
                    $conn->query($sql3);
                }
        }
        header("location: dashboard.php");
    }

    if ($commentNum != "" && $comment != "") {
        $sql = "INSERT INTO comments (user_name, comment, text) VALUES ('$username', '$comment', '$commentNum')";
        $conn->query($sql);
        header("location: dashboard.php");
    }

    if ($delete != "") {
        $sql = "DELETE FROM comments WHERE id = '$delete'";
        $conn->query($sql);
        header("location: dashboard.php");
    }

    if ($deletePost != "") {
        $sql = "DELETE FROM posts WHERE id = '$deletePost'";
        $conn->query($sql);
        header("location: dashboard.php");
    }


    if ($likeDisplay != "") {
        $sql = "UPDATE posts SET liked = '1' WHERE id = '$likeDisplay' ";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT num_of_likes FROM posts WHERE id = '$likeDisplay'";
            $result = $conn->query($sql2);
                while ($row = $result->fetch_assoc()) {
                    $likes = $row["num_of_likes"];
                    $likes++;
                    $sql3 = "UPDATE posts SET num_of_likes = '$likes' WHERE id = '$likeDisplay'";
                    $conn->query($sql3);
                }
        }
        header("location: displayPosts.php");
    }

    if ($commentNumDisplay != "" && $commentDisplay != "") {
        $sql = "INSERT INTO comments (user_name, comment, text) VALUES ('$username', '$commentDisplay', '$commentNumDisplay')";
        $conn->query($sql);
        header("location: displayPosts.php");
    }

    if ($deleteDisplay != "") {
        $sql = "SELECT * FROM comments WHERE user_name = '$username'";
        $result9 = $conn->query($sql);
        $row = $result9->fetch_assoc();
        if ($row['id'] == $deleteDisplay) {
            $sql2 = "DELETE FROM comments WHERE id = '$deleteDisplay'";
            $conn->query($sql2);
            header("location: displayPosts.php");
        } else {
            header("location: displayPosts.php");
            echo "<p>You can only delete your posts<p>";
        }
    }

?>