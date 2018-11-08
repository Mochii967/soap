<?php
    include("include/header.php");
?>



<main class="container">
    <form method="Post" action="process.php">
        <label for="firstName" class="white-text">First Name:</label><br>
        <input type="text" name="firstName"><br>
        <label for="lastName" class="white-text">Last Name:</label><br>
        <input type="text" name="lastName"><br>
        <label for="email" class="white-text">Email:</label><br>
        <input type="email" name="email"><br>
        <label for="userName" class="white-text">Username:</label><br>
        <input type="text" name="userName"><br>
        <label for="password" class="white-text">Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" class="btn deep-orange lighten-2">
    </form>
    <a href="login.php" class="btn deep-orange lighten-2 right" style="margin-top:-35px;">Log In</a>
</main>



<?php
    include("include/footer.php");
?>