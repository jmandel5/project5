<?php
include('renderform.php');

// connect to the database
include('connect-db.php');

// check if the form (from renderform.php) has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit'])) {
	// confirm that the 'id' value is a valid integer before getting the form data
	if (is_numeric($_POST['id'])) {
		// get form data, making sure it is valid
		$id = $_POST['id'];
        $img = mysqli_real_escape_string($connection, htmlspecialchars($_FILES['img']['name']));
        $fullName = mysqli_real_escape_string($connection, htmlspecialchars($_POST['fullName']));
        $major = mysqli_real_escape_string($connection, htmlspecialchars($_POST['major']));
        $minor = mysqli_real_escape_string($connection, htmlspecialchars($_POST['minor']));
        $cluster = mysqli_real_escape_string($connection, htmlspecialchars($_POST['cluster']));
        $dmajor = mysqli_real_escape_string($connection, htmlspecialchars($_POST['dmajor']));
        $text = mysqli_real_escape_string($connection, htmlspecialchars($_POST['text']));
        $link = mysqli_real_escape_string($connection, htmlspecialchars($_POST['link']));

		if ($fullName == '' || $major == '' || $text == '' || $link == '') {
			// generate error message
			$error = true;

			//error, display form
			renderForm($id, 'Update ' . $fullName . ' Information', $img, $fullName, $major, $minor, $cluster, $dmajor, $text, $link, $error);

		} else {
			// save the data to the database
			$result = mysqli_query($connection, "UPDATE studentlist SET img='$img', fullName='$fullName', major='$major', minor='$minor', cluster='$cluster', dmajor='$dmajor', text='$text', link='$link' WHERE id='$id'");

			// once saved, redirect back to the homepage page to view the results
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
			renderForm($id, 'Update ' . $fullName . ' Information', $img, $fullName, $major, $minor, $cluster, $dmajor, $text, $link, false);
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