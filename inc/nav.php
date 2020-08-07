<nav class=" menu navbar navbar-expand-lg navbar-dark bg-color">
    <div class="logo"><a href="index.php">CSC 174</a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-home nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-home nav-item">
                <a class="nav-link" href="students.php">Students</a>
            </li>
            <!-- If logged in, give option to add new student -->
            <?php if(isset($_SESSION['username'])) { ?>
                <li class="nav-item nav-home">
                    <a class="nav-link" href="new.php">Add New Student</a>
                </li>
            <?php } ?> 
            <!-- If logged in, show logout link. Else, show login button -->
            <?php if(isset($_SESSION['username'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php } ?> 
            <!--<li><a href="hy.php">Huiyu (Bonnie) Yang</a></li>
            <li><a href="joe.php">Joe Madejski</a></li>
            <li><a href="qi.php">Qi Miao</a></li>-->
        </ul>
    </div>
</nav>