<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Phone list</title>
</head>
<body>
<?php
// connect to the database
include('connect-db.php');

// get results from database
$result = mysqli_query($connection, "SELECT * FROM epollack_phonelist");
?>

<table border>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Phone Number</th>
    <th>Email Address</th>
    <th colspan="2"><em>functions</em></th>
  </tr>
<?php
// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {
?>
  <tr>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
    <td><a onclick="return confirm('Are you sure you want to delete: <?php echo $row["firstname"] . " " . $row["lastname"]; ?>?')" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
  </tr>
<?php
// close the loop
}
?>
</table>

<div>
  <br>
	<a href="new.php">Add a new record</a>
</div>
</body>
</html>
<?php
  mysqli_free_result($result);
  mysqli_close($connection);
?>