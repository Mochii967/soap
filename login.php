<?php
    include("include/header.php");
?>

<main class="container">
    <form method="POST" action="action.php">
        <label for="username" class="white-text">Enter Username:</label><br>
        <input name="username" type="text"><br>
        <label for="password" class="white-text">Enter Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" class="btn deep-orange lighten-2">
    </form>
</main>

<?php
    include("include/footer.php");
?>