<?php
    include("include/header.php");
    if (empty($_SESSION['firstName'])) {
        header("location: index.php");
    }
?>


<main class="container">
    <form method="POST" action="process_post.php">
        <label for="post" class="white-text">Share what is on your mind</label><br>
        <textarea cols="100" rows="50" name="post"></textarea><br>
        <input type="submit" class="btn deep-orange lighten-2">
    </form>
    <p>
        <a href="dashboard.php">Cancel</a>
    </p>
</main>




<?php
    include("include/footer.php");
?>