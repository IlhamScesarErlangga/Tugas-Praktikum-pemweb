<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example</title>
</head>
<body>

<?php

// Connection details
$server = "localhost";
$username = "username";
$password = "password";
$database = "UAS-Pemweb";

// Connect to the database
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create record
if (isset($_POST['create'])) {
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $sql = "INSERT INTO table_name (field1, field2) VALUES ('$field1', '$field2')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Read records
$sql = "SELECT * FROM table_name";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["field1"]. " " . $row["field2"]. " ";
        echo "<a href='?update=" . $row["id"] . "'>Update</a> ";
        echo "<a href='?delete=" . $row["id"] . "'>Delete</a> <br>";
    }
} else {
    echo "0 results";
}

// Update record
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $field1 = $_POST['field1'];
    $field2 = $_POST['field2'];
    $sql = "UPDATE table_name SET field1='$field1', field2='$field2' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM table_name WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>