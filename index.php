<?php
$customCSS = "<link rel=\"stylesheet\" href=\"css/home.css\">";
$useNav = false;
$bodyCSS = "z-pattern";
include "inc/html-top.php";
?>
<header>
    <div class="container">
        <h2>CSC 174</h2>

        <div class="login">
            <h3>Log In</h3>
            <label for="username">Username</label>
            <input type="text" placeholder="Username" name="username" required>
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">Sign In</button>
        </div>
    </div>

</header>

<main>
    <h1>Advanced Front-End Web Design And Development</h1>
</main>

<footer>
    <div class="container">
        <aside>
            <h3>Summer 2020</h3>
        </aside>

        <h3><a href="students.php">View Our Page</a></h3>
    </div>
</footer>

<?php include "inc/scripts.php" ?>
</body>
</html>