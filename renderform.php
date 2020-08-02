<?php
// creates the edit record form
function renderForm($id, $header, $img, $fullName, $major, $minor, $cluster, $dmajor, $text, $link, $errors) {
?>

<?php
$customCSS = "<link rel='stylesheet' href='css/styles.css'>";
$useNav = true;
$bodyCSS = "";
include "inc/html-top.php";
?>

<section id="wrapper" class="section">
    <div class="container">
        <h1><?php echo $header ?></h1>
        <form action="<?php echo basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php" ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="fullName">Full Name*</label>
                <input type="text" class="form-control <?php if($errors["fullName"]) { echo "is-invalid"; } ?>" id="fullName" name="fullName" maxlength="100" value="<?php echo $fullName; ?>" required>
            </div>

            <div class="form-group">
                <label for="major">Major*</label>
                <input type="text" class="form-control <?php if($errors["major"]) { echo "is-invalid"; } ?>" id="major"  name="major"  maxlength="50" value="<?php echo $major; ?>" required>
            </div>

            <div class="form-group">
                <label for="dmajor">Double Major</label>
                <input type="text" class="form-control <?php if($errors["dmajor"]) { echo "is-invalid"; } ?>" id="dmajor"  name="dmajor"  maxlength="50" value="<?php echo $dmajor; ?>">
            </div>

            <div class="form-group">
                <label for="minor">Minor</label>
                <input type="text" class="form-control" id="minor"  name="minor"  maxlength="50" value="<?php echo $minor; ?>">
            </div>

            <div class="form-group">
                <label for="cluster">Cluster</label>
                <input type="text" class="form-control" id="cluster"  name="cluster"  maxlength="50" value="<?php echo $cluster; ?>">
            </div>

            <div class="form-group">
                <label for="text">About*</label>
                <textarea class="form-control <?php if($errors["text"]) { echo "is-invalid"; } ?>" id="text"  name="text"  rows="3" maxlength="1000" required><?php echo $text; ?></textarea>
            </div>

            <div class="form-group">
                <label for="link">Link to Page</label>
                <input type="text" class="form-control" id="link"  name="link"  maxlength="100" value="<?php echo $link; ?>">
            </div>

            <div class="form-group">
                <label for="img">Profile Picture</label>
                <input type="file" class="form-control-file <?php if($errors["img"]) { echo "is-invalid"; } ?>" id="img"  name="img" accept="image/x-png,image/gif,image/jpeg">
            </div>

            <?php if ($img != '') { ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="removeImg"  name="removeImg">
                    <label for="removeImg">Remove Old Profile Picture</label>
                </div>
            <?php }?>

            <p>Fields marked with * are required.</p>

            <input class="submit btn btn-primary" type="submit" name="submit" value="Post!">
            <div>
                <a href="students.php" class="btn btn-danger btn-block">Cancel</a>
            </div>
        </form>
    </div>
</section>

<footer>
    CSC 174: Advanced Front-end Design and Development - Project 4
</footer>

<?php include "inc/scripts.php" ?>
</body>
</html>
<?php
}
?>