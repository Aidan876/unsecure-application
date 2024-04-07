<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Include our connection
include 'dbconfig.php';

// Function to sanitize input
function sanitize_input($input) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
}

// Query from the table that we create
$sql = "SELECT rowid, * FROM members";
$query = $db->query($sql);

// Display table based on user's role
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUD Operation on SQLite3 Database using PHP</title>
</head>
<body>
<?php if ($_SESSION['role'] === 'admin'): ?>
    <a href="add.php">Add</a>
<?php endif; ?>

<table border="1">
    <thead>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <th>Action</th>
        <?php endif; ?>
    </thead>
    <tbody>
        <?php while($row = $query->fetchArray()): ?>
            <tr>
                <td><?= $row['rowid'] ?></td>
                <td><?= $row['firstname'] ?></td>
                <td><?= $row['lastname'] ?></td>
                <td><?= $row['address'] ?></td>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <td>
                        <a href='edit.php?id=<?= sanitize_input($row['rowid']) ?>'>Edit</a>
                        <a href='delete.php?id=<?= sanitize_input($row['rowid']) ?>'>Delete</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>