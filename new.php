<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: students.php");
    exit;
}
?>

<?php
include('renderform.php');

// connect to the database
include('connect-db.php');

$errors = array(
    "fullName" => false,
    "major" => false,
    "dmajor" => false,
    "text" => false,
    "img" => false,
);

// check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit'])) {
    $filename = '';

    if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["img"]["name"];
        $filetype = $_FILES["img"]["type"];
        $filesize = $_FILES["img"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            do{
                $filename = uniqid() . '.' . array_keys($allowed, $filetype)[0];
            } while (file_exists("upload/" . $filename));

            move_uploaded_file($_FILES["img"]["tmp_name"], "images/upload/" . $filename);
        } else{
            $errors["img"] = true;
        }
    }
    else if($_FILES["img"]["name"] == '') {
        $errors["img"] = false;
    }
    else{
        $errors["img"] = true;
    }

    $img = '';

    if ($_FILES["img"]["name"] != '') {
        $img = mysqli_real_escape_string($connection, htmlspecialchars($filename));
    }
    $fullName = mysqli_real_escape_string($connection, htmlspecialchars($_POST['fullName']));
    $major = mysqli_real_escape_string($connection, htmlspecialchars($_POST['major']));
    $minor = mysqli_real_escape_string($connection, htmlspecialchars($_POST['minor']));
    $cluster = mysqli_real_escape_string($connection, htmlspecialchars($_POST['cluster']));
    $dmajor = mysqli_real_escape_string($connection, htmlspecialchars($_POST['dmajor']));
    $text = mysqli_real_escape_string($connection, htmlspecialchars($_POST['text']));
    $link = mysqli_real_escape_string($connection, htmlspecialchars($_POST['link']));

    if ($fullName == '') {
        $errors["fullName"] = true;
	}

    if ($major == '') {
        $errors["major"] = true;
    }

    if ($text == '') {
        $errors["text"] = true;
    }

    if ($major == '' && $dmajor != '') {
        $errors["major"] = true;
        $errors["dmajor"] = true;
    }

    $errorGenerated = false;

    foreach ($errors as $error) {
          if ($error) {
              renderForm($id, 'Add New Student', $img, $fullName, $major, $minor, $cluster, $dmajor, $text, $link, $errors);
              $errorGenerated = true;
              break;
          }
    }

    // To remove PHP Warning:  Cannot modify header information
    if (!$errorGenerated)
    {
        $result = mysqli_query($connection, "INSERT INTO studentlist (img, fullName, major, minor, cluster, dmajor, text, link) VALUES ('$img', '$fullName', '$major', '$minor', '$cluster', '$dmajor', '$text', '$link')");
        header("Location: students.php");
    }
}
else {
    renderForm('','Add New Student','','', '', '', '', '', '', '',$errors);
}
?>