<?php
$customCSS = "<link rel='stylesheet' href='css/styles.css'>";
$useNav = true;
$bodyCSS = "";
include "inc/html-top.php";

include ('connect-db.php');

$result = mysqli_query($connection, "SELECT * FROM studentlist");
?>

<div id="wrapper" class="background home">
    <div class="container">
        <article>

            <?php
            while ($row = mysqli_fetch_array($result)){
            ?>

            <div class="profile">
                <div class="profile_img">
                    <?php
                    if ($row['img'] != NULL){
                        echo '<img src="images/'.$row["img"].'" alt="'.$row["fullName"].' photo" width="268">';
                    } else {
                        echo '<img src="images/defaults/default-profile.jpg" alt="default">';
                    }
                    ?>
                </div>
                <div class="split">
                    <div>
                        <h2><?php echo $row['fullName'];?></h2>
                        <h3 class="major">Major in <?php echo $row['major'];?></h3>
                        <h3 class="major">Minor in Clinical Psychology</h3>
                        <p><?php echo $row['text'];?></p>
                    </div>
                    <div class="link">
                        <a href="<?php echo $row['link'];?>" class="button-link">View <?php echo $row['fullName'];?>'s Page</a>
                    </div>
                </div>
                <a href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete: <?php echo $row["fullName"];?>?')" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </div>

            <?php
            }
            ?>

            <div class="profile">
                <div class="profile_img">
                    <img src="images/joe_photo.jpg" alt="Joe's photo">
                </div>
                <div class="split">
                    <div>
                        <h2>Joe Madejski</h2>
                        <h3 class="major">Major in Cell and Tissue Engineering</h3>
                        <h3 class="major">Cluster in Abnormal Psychology</h3>
                        <p>My name is Joe Madejski. I was born in Western NY and have lived there since. I am the youngest of his
                            siblings, and therefore the best of them. A graduate of Albion Central Schools, I am currently attending
                            the University of Rochester studying Cell and Tissue Engineering.</p>
                    </div>
                    <div class="link">
                        <a href="joe.php">View Joe's Page</a>
                    </div>
                </div>

            </div>

            <div class="profile">
                <div class="profile_img">
                    <img src="images/qi_photo.jpg" alt="Qi's photo">
                </div>
                <div class="split">
                    <div>
                        <h2>Qi Miao</h2>
                        <h3 class="major">Major in Computer Science</h3>
                        <h3 class="major">Major in Digital Media Studies</h3>
                        <p>My name is Qi Miao. I also go by Iris. I am a rising junior, majoring in Computer Science and Digital
                            Media Studies. I participate in Modern Language and Culture Undergraduate Council and Active Minds. I am
                            interested in psychology, so I am going to minor in psychology as well. I know some programming
                            languages like JAVA, HTML, CSS, and C, and I have some expereince in coding. I also like studying
                            languages and astrology myself.</p>
                    </div>
                    <div class="link">
                        <a href="qi.php">View Qi's Page</a>
                    </div>
                </div>
            </div>
        </article>
    </div><!-- used for center container -->
</div>

<footer>
    CSC 174: Advanced Front-end Design and Development - Project 4
</footer>

<?php include "inc/scripts.php" ?>
</body>
</html>