<?php
// connect to the database
include('connect-db.php');

// check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	// get id value
	$id = $_GET['id'];

	// delete the entry
	$result = mysqli_query($connection, "DELETE FROM studentlist WHERE id=$id");

	// redirect back to the homepage to see the results
	header("Location: index.php");

} else {
	// if id isn't set, or isn't valid, redirect back to homepage
	header("Location: index.php");
}
?>