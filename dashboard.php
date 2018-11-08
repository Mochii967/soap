<?php
    include("include/header.php");
    include("include/config.php");
    if (empty($_SESSION['firstName'])) {
        header("location: index.php");
    }
?>

<main class="container">
    <h1>Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?> </h1>
    <h2><a href="displayPosts.php">View all posts</a></h2>
    <h2><a href="createPost.php">Create a new Post</a></h2>
    <h2>Here are your posts</h2>
    <?php
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM posts WHERE user_name = '$username'";
        $result = $conn->query($sql);
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i = $row["id"];
            $_SESSION['post_id'] = $row["id"];
            $index = $row["id"];
            $_SESSION['post_id' . $i] = $_SESSION['post_id'];
            echo "<div class='card deep-orange accent-3'>";
            echo "<div class='card-content'>";
            echo "<h2 style='font-size:2em;font-weight:bold;' class='card-title center-align title'> Post " . $row["id"] . "</h2>";
            echo "<p class='center-align'>" . $row["content"] . "</p>";
            echo "<p class='center-align'>" . $row["time_posted"] . "</p>";
            echo "<form method='POST' action='liked.php'>";
            echo "<input type='text' value='" . $i . "' style='display: none;' name='liked'>";
            echo "<input class='btn-floating btn-large deep-orange lighten-2' style='margin-left:20px;' type='submit' value='like'>";
            echo "</form>";
            echo "<form method='POST' action='liked.php'>";
            echo "<input type='text' value='" . $i . "' style='display: none;' name='deletePost'>";
            echo "<input class='right btn btn-large deep-orange lighten-2 higher' type='submit' value='Delete Post'>";
            echo "</form>";
            echo "<p class='move-up' style='margin-top:-20px;'>" . $row["num_of_likes"] . "</p>";
            $sql2 = "SELECT * FROM comments WHERE text = '$index'";
            $result2 = $conn->query($sql2);
            if (empty($result2)) {
                echo "There are no comments at this time for this post.";
            } else {
                while ($row2 = $result2->fetch_assoc()) {
                    $p = $row2["id"];
                    echo "<section class='container deep-orange lighten-3 margin'>";
                    echo "<p class='center-align'>" . $row2["user_name"] . "</p>";
                    echo "<p class='center-align'>" . $row2["comment"] . "</p>";
                    echo "<p class='center-align'>" . $row2["time_posted"] . "</p>";
                    echo "<form method='POST' action='liked.php'>";
                    echo "<input type='text' name='delete' value='" . $p . "' style='display: none;'>";
                    echo "<input class='btn deep-orange lighten-2 push-right' type='submit' value='delete'>";
                    echo "</form>";
                    echo "</section>";
                }
            }
            echo "<div class='container deep-orange lighten-3 margin'>";
            echo "<form method='POST' action='liked.php'>";
            echo "<textarea cols='20' rows='20' name='comment'></textarea><br>";
            echo "<input type='text' value='" . $i . "' name='submitComment' style='display: none;'>";
            echo "<input type='submit' class='btn deep-orange lighten-2 push-right' value='post comment'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>

    <p>
        <a href="index.php">Log off</a>
    </p>
</main>

<?php
    include("include/footer.php");
?>