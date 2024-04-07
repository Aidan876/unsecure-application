<?php
// Include our connection
include 'dbconfig.php';

// Check if 'id' parameter is provided and is numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitize the input
    $id = $_GET['id'];

    // Prepare the delete statement
    $sql = "DELETE FROM members WHERE rowid = ?";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $id, SQLITE3_INTEGER);
    $stmt->execute();
}

// Redirect back to index.php
header('location: index.php');
exit;
?>