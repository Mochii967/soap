<?php
$servername = "ec2-54-225-98-131.compute-1.amazonaws.com
";
$username = "nywtvlxdfpzbeb";
$password = "efe4ca95ac031b6693492a14d48884c31832df8b28696f8cc80e5f83bdcf4353";
$dbname = "db1v02bo1b416s";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
