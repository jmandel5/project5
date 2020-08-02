<?php
$customCSS = "<link rel='stylesheet' href='css/home.css'>";
$useNav = false;
$bodyCSS = "z-pattern";
include "inc/html-top.php";
?>
<header>
    <div class="container">

        <div class="title">
            <h1>CSC 174</h1>
            <h2>Fall 2020</h2>
        </div>

        <div class="login">
            <h2>Login</h2>
            <label for="username">Username</label>
            <input type="text" placeholder="Username" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" required>
            <button type="submit">Login</button>
        </div>
    </div>

</header>

<main>
    <img src="images/uorlogo.png" alt="University of Rochester Logo">
</main>

<footer>
    <div class="container">
        <aside>
            <h2>Advanced Front End Development</h2>
        </aside>

        <h2><a href="students.php">View Our Page</a></h2>
    </div>
</footer>

<?php include "inc/scripts.php" ?>
</body>
</html>