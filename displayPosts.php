<?php
    include("include/config.php");
    include("include/header.php");
    if (empty($_SESSION['firstName'])) {
        header("location: index.php");
    }
?>

<?php
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM posts";
        $result = $conn->query($sql);
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i = $row["id"];
            $_SESSION['post_id'] = $row["id"];
            $index = $row["id"];
            $_SESSION['post_id' . $i] = $_SESSION['post_id'];
            echo "<div class='card deep-orange accent-3'>";
            echo "<div class='card-content'>";
            echo "<h2 style='font-size:2em;font-weight:bold;' class='card-title center-align title'> Post " . $row["id"] . " by: " . $row["user_name"] ."</h2>";
            echo "<p class='center-align'>" . $row["content"] . "</p>";
            echo "<p class='center-align'>" . $row["time_posted"] . "</p>";
            echo "<form method='POST' action='liked.php'>";
            echo "<input type='text' value='" . $i . "' style='display: none;' name='likedDisplay'>";
            echo "<input class='btn-floating btn-large deep-orange lighten-2' style='margin-left:25px;' type='submit' value='like'>";
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
                    echo "<input type='text' name='deleteDisplay' value='" . $p . "' style='display: none;'>";
                    echo "<input class='btn deep-orange lighten-2 push-right' type='submit' value='delete'>";
                    echo "</form>";
                    echo "</section>";
                }
            }
            echo "<div class='container deep-orange lighten-3 margin'>";
            echo "<form method='POST' action='liked.php'>";
            echo "<textarea cols='20' rows='20' name='commentDisplay'></textarea><br>";
            echo "<input type='text' value='" . $i . "' name='submitCommentDisplay' style='display: none;'>";
            echo "<input type='submit' class='btn deep-orange lighten-2 push-right' value='post comment'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>

<?php
    include("include/footer.php");
?>