<?php
//Create a new SQLite3 Database
$db = new SQLite3('members.db');

//Create a new table to our database 
$query = "CREATE TABLE IF NOT EXISTS members (firstname STRING, lastname STRING, address STRING)";
$db->exec($query);

?>
