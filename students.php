<?php session_start(); ?>

<?php
$customCSS = "<link rel='stylesheet' href='css/styles.css'>";
$useNav = true;
$useBS = true;
$bodyCSS = "";
include "inc/html-top.php";

include ('connect-db.php');

$result = mysqli_query($connection, "SELECT * FROM studentlist ORDER BY fullName");
?>

<div id="wrapper" class="background home">
    <div class="container">

        <h1>Student Directory</h1>

        <article>

            <?php
            while ($row = mysqli_fetch_array($result)){
            ?>

            <div class="profile">
                <div class="profile_img">
                    <?php
                    if ($row['img'] != NULL){
                        echo '<img src="images/upload/'.$row["img"].'" alt="'.$row["fullName"].' photo">';
                    } else {
                        echo '<img src="images/defaults/profile.png" alt="default">';
                    }
                    ?>
                </div>
                <div class="split">
                    <div>
                        <h2><?php echo $row['fullName'];?></h2>
                        <?php
                            if ($row['major'] != '' && $row['dmajor'] != '')
                            {
                                echo '<h3 class="major\">Double Major in ' . $row['major'] . ' and ' . $row['dmajor'] .'</h3>';
                            }
                            else if($row['major'] != '')
                            {
                                echo '<h3 class="major\">Major in ' . $row['major'] . '</h3>';
                            }
                            if($row['minor'] != '')
                            {
                                echo '<h3 class="major\">Minor in ' . $row['minor'] . '</h3>';
                            }
                            if($row['cluster'] != '')
                            {
                                echo '<h3 class="major\">Cluster in ' . $row['cluster'] . '</h3>';
                            }
                        ?>

                        <p><?php echo $row['text'];?></p>
                    </div>
                    <div class="link">
                        <div class="edit-delete">
                            <!-- If logged in, show edit/delete functions -->
                            <?php if(isset($_SESSION['username'])) { ?>
                                <a href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete: <?php echo $row["fullName"];?>?')" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            <?php } ?>    
                        </div>
                        <div class="view-page">
                            <a href="<?php echo $row['link'];?>" class="button-link">View <?php echo $row['fullName'];?>'s Page</a>
                        </div>
                    </div>

                </div>
            </div>

            <?php
            }
            ?>
        </article>
    </div><!-- used for center container -->
</div>

<footer>
    CSC 174: Advanced Front-end Design and Development - Project 4
</footer>

<?php include "inc/scripts.php" ?>
</body>
</html>