<?php
include("include/config.php");
session_start();
if (empty($_SESSION['firstName'])) {
    header("location: index.php");
}

$username = htmlentities($_POST['userName']);
$firstName = htmlentities($_POST['firstName']);
$email = htmlentities($_POST['email']);
$lastName = htmlentities($_POST['lastName']);
$password = htmlentities($_POST['password']);

$sql = "SELECT id FROM user_info WHERE user_name = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "This username is already taken.";
} else {
    $sql = "INSERT INTO user_info (first_name, last_name, email, user_name, password) VALUES ('$firstName', '$lastName', '$email', '$username', '$password')";
    $conn->query($sql);
    session_start();
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['username'] = $username;
    header("location: dashboard.php");
}

?>