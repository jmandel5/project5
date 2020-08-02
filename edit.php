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

// check if the form (from renderform.php) has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit'])) {
	// confirm that the 'id' value is a valid integer before getting the form data
	if (is_numeric($_POST['id'])) {
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

                move_uploaded_file($_FILES["img"]["tmp_name"], getcwd() . "\images\upload\\" . $filename);
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

        $id = $_POST['id'];
        $img = '';
        $result = mysqli_query($connection, "SELECT * FROM studentlist WHERE id=$id");
        $row = mysqli_fetch_array( $result );

        if ($_FILES["img"]["name"] != '') {
            $img = mysqli_real_escape_string($connection, htmlspecialchars($filename));
        }
        else if (!$_POST['removeImg'] && $row['img'] != '')
        {
            $img = $row['img'];
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
                renderForm($id, 'Update ' . $fullName . ' Information', $img, $fullName, $major, $minor, $cluster, $dmajor, $text, $link, $errors);
                $errorGenerated = true;
                break;
            }
        }

        // To remove PHP Warning:  Cannot modify header information
        if (!$errorGenerated)
        {
            $result = mysqli_query($connection, "UPDATE studentlist SET img='$img', fullName='$fullName', major='$major', minor='$minor', cluster='$cluster', dmajor='$dmajor', text='$text', link='$link' WHERE id='$id'");
            header("Location: students.php");
        }
	} else {
		// if the 'id' isn't valid, display an error
		echo 'Error!';
	}
} else {
	// if the form (from renderform.php) hasn't been submitted yet, get the data from the db and display the form
	// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
		// query db
		$id = $_GET['id'];
		$result = mysqli_query($connection, "SELECT * FROM studentlist WHERE id=$id");
		$row = mysqli_fetch_array( $result );

		// check that the 'id' matches up with a row in the databse
		if($row) {
			// get data from db
            $img = $row['img'];
			$fullName = $row['fullName'];
			$major = $row['major'];
			$minor = $row['minor'];
			$cluster = $row['cluster'];
			$dmajor = $row['dmajor'];
			$text = $row['text'];
			$link = $row['link'];

			// show form
			renderForm($id, 'Update ' . $fullName . ' Information', $img, $fullName, $major, $minor, $cluster, $dmajor, $text, $link, $errors);
		} else {
			// if no match, display result
			echo "No results!";
		}
	} else {
		// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
		echo 'Error!';
	}
}
?>