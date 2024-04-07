<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD Operation on SQLite3 Database using PHP</title>
</head>
<body>
<a href="add.php">Add</a>

<table border="1">
	<thead>
		<th>ID</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Address</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php
			//include our connection
			include 'dbconfig.php';

			//query from the table that we create
			$sql = "SELECT rowid, * FROM members";
			$query = $db->query($sql);

			while($row = $query->fetchArray()){
				echo "
					<tr>
						<td>".$row['rowid']."</td>
						<td>".$row['firstname']."</td>
						<td>".$row['lastname']."</td>
						<td>".$row['address']."</td>
						<td>
							<a href='edit.php?id=".$row['rowid']."'>Edit</a>
							<a href='delete.php?id=".$row['rowid']."'>Delete</a>
						</td>
					</tr>
				";
			}
		?>
	</tbody>
</table>
</body>
</html>