<?php
    include("include/config.php");
    session_start();
    if (empty($_SESSION['firstName'])) {
        header("location: index.php");
    }

    $post = htmlentities($_POST['post']);
    $username = $_SESSION['username'];

    if (!empty($post)) {
        $sql = "INSERT INTO posts (content, user_name) VALUES ('$post', '$username')";
        $conn->query($sql);
        header("location: dashboard.php");
    } else {
        header("location: createPost.php");
    }
?>