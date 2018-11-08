<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Soap</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" />
        <style>
            .margin {
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .push-right {
                margin-left: 10px;
                margin-bottom: 5px;
            }
            .higher {
                margin-top: -55px;
            }
            .move-up {
                margin-top: -30px;
            }
            p {
                font-size: 1.8em;
            }
            textarea {
                border: solid thin black;
            }
            label {
                font-size: 1.8em;
            }
            .margin-nav {
                margin-right: 10px;
                margin-left: 10px;
                font-size: 1.8em;
            }
        </style>
    </head>
    <body class="deep-orange">
        <nav class="deep-orange darken-3">
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo">Logo</a>
                <a href="dashboard.php" class="right margin-nav">Dashboard</a>
                <a href="displayPosts.php" class="right margin-nav">View Posts</a>
            </div>
        </nav>
