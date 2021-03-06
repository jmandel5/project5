<?php session_start(); ?>

<?php
$customCSS = "<link rel='stylesheet' href='css/home.css'>";
$useNav = false;
$useBS = false;
$bodyCSS = "z-pattern";
include "inc/html-top.php";
?>
    
        <header>
            <div class="container">
                <div class="title">
                    <h1> <a href="#"> CSC 174</a> </h1>
                    <h2>Fall 2020</h2>
                </div>

                <div class="login">
                    <!-- if logged in, show welcome message. Else, show login link -->
                    <?php if(isset($_SESSION['username'])) { ?>
                        <!-- welcome message with username -->
                        <div >Welcome, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</div>
                        <a href="logout.php">Logout</a>
                    <?php } else { ?>
                        <div>Are you a CSC 174 Student?</div>
                        <a href="login.php">Login Here</a>
                    <?php } ?> 
                </div>  
            </div>
        </header>

        <main>
            <img src="images/uorlogo.png" alt="University of Rochester Logo">
        </main>
    
        <footer>
            <div class="container">
                <aside>
                    <h2>About This Site</h2>
                    <p> This is a site that introduces the students of CSC 174. 
                    You can learn more about them including their major, hobbies, 
                    and see their personal site. </p> 
                </aside>

                <a href="students.php">View Our Page</a>
             </div>
        </footer>
   
<?php include "inc/scripts.php" ?>
</body>
</html>