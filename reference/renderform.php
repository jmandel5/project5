<?php
// creates the edit record form
function renderForm($id, $firstname, $lastname, $error, $phone, $email) {
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Phone list</title>
</head>
<body>
<?php
// if there are any errors, display them
if ($error != '') {
	echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>
<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br>
	<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br>
    <strong>Phone Number: *</strong> <input type="text" name="phone" value="<?php echo $phone; ?>"/><br>
    <strong>Email: *</strong> <input type="text" name="email" value="<?php echo $email; ?>"/><br>
    <div>* required</div>
	<input type="submit" name="submit" value="Submit">
</form>

<div>
	<br>
	<a href=".">Cancel</a>
</div>

</body>
</html>
<?php
}
?>