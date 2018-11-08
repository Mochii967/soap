<?php
    include("include/config.php");
    session_start();
    if (empty($_SESSION['firstName'])) {
        header("location: index.php");
    }
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    $sql = "SELECT * FROM user_info WHERE password = '$password' AND user_name = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION['firstName'] = $row["first_name"];
            $_SESSION['lastName'] = $row["last_name"];
            $_SESSION['username'] = $row["user_name"];
        }
        header("location: dashboard.php");
    } else {
        echo "Invalid Username or password";
    }
?>