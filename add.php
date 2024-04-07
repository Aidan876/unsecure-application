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
    // Include our connection
    include 'dbconfig.php';

    // Sanitize input
    $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
    $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO members (firstname, lastname, address) VALUES (?, ?, ?)";
    
    // Prepare the statement
    $stmt = $db->prepare($sql);

    // Bind parameters to the statement
    $stmt->bindParam(1, $firstname, SQLITE3_TEXT);
    $stmt->bindParam(2, $lastname, SQLITE3_TEXT);
    $stmt->bindParam(3, $address, SQLITE3_TEXT);

    // Execute the statement
    $stmt->execute();

    // Redirect after insertion
    header('location: index.php');
}
?>
</body>
</html>