<?php
include('renderform.php');

// connect to the database
include('connect-db.php');

// check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit'])) {
	// get form data, making sure it is valid
    $fullName = mysqli_real_escape_string($connection, htmlspecialchars($_POST['fullName']));
    $major = mysqli_real_escape_string($connection, htmlspecialchars($_POST['major']));
    $minor = mysqli_real_escape_string($connection, htmlspecialchars($_POST['minor']));
    $cluster = mysqli_real_escape_string($connection, htmlspecialchars($_POST['cluster']));
    $dmajor = mysqli_real_escape_string($connection, htmlspecialchars($_POST['dmajor']));
    $text = mysqli_real_escape_string($connection, htmlspecialchars($_POST['text']));
    $link = mysqli_real_escape_string($connection, htmlspecialchars($_POST['link']));

	if ($fullName == '') {
		// generate error message
		$error = true;

		// if either field is blank, display the form again
        renderForm('', 'Add New Student', $fullName, $major, $minor, $cluster, $dmajor, $text, $link, $error);

	} else {
		// save the data to the database
		$result = mysqli_query($connection, "INSERT INTO studentlist (fullName, major, minor, cluster, dmajor, text, link) VALUES ('$fullName', '$major', '$minor', '$cluster', '$dmajor', '$text', '$link')");

		// once saved, redirect back to the view page
		header("Location: index.php");
	}
} else {
	// if the form hasn't been submitted, display the form
	renderForm('','Add New Student','','', '', '', '', '', '', false);
}
?>