<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD Operation on SQLite3 Database using PHP</title>
</head>
<body>
<form method="POST">
	<a href="index.php">Back</a>
	<p>
		<label for="firstname">Firstname:</label>
		<input type="text" id="firstname" name="firstname">
	</p>
	<p>
		<label for="lastname">Lastname:</label>
		<input type="text" id="lastname" name="lastname">
	</p>
	<p>
		<label for="address">Address:</label>
		<input type="text" id="address" name="address">
	</p>
	<input type="submit" name="save" value="Save">
</form>
<?php
	if(isset($_POST['save'])){
		//include our connection
		include 'dbconfig.php';

		//insert query
		$sql = "INSERT INTO members (firstname, lastname, address) VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['address']."')";
		$db->exec($sql);

		header('location: index.php');

	}
?>
</body>
</html>