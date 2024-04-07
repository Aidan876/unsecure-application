<?php
    //include our connection
    include 'dbconfig.php';

    //get the row of selected id
    $sql = "SELECT rowid, * FROM members WHERE rowid = ?";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $_GET['id'], SQLITE3_INTEGER);
    $result = $stmt->execute();
    $row = $result->fetchArray();

?>
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
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($row['firstname']); ?>">
    </p>
    <p>
        <label for="lastname">Lastname:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($row['lastname']); ?>">
    </p>
    <p>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($row['address']); ?>">
    </p>
    <input type="submit" name="save" value="Save">
</form>
<?php
    if(isset($_POST['save'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];

        //update our table using prepared statements
        $sql = "UPDATE members SET firstname = :firstname, lastname = :lastname, address = :address WHERE rowid = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':firstname', $firstname, SQLITE3_TEXT);
        $stmt->bindValue(':lastname', $lastname, SQLITE3_TEXT);
        $stmt->bindValue(':address', $address, SQLITE3_TEXT);
        $stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
        $stmt->execute();

        header('location: index.php');
    }
?>
</body>
</html>