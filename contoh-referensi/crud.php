<?php
// Referensi https://github.com/chapagain/crud-php-simple
// https://github.com/frama21/simple-crud-php
// Connection details
$server = "localhost";
$username = "root";
$password = "";
$database = "UAS-Pemweb";

// Connect to the database
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create record
$sql = "INSERT INTO table_name (field1, field2) VALUES ('value1', 'value2')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Read records
$sql = "SELECT * FROM table_name";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["field1"]. " " . $row["field2"]. "<br>";
    }
} else {
    echo "0 results";
}

// Update record
$sql = "UPDATE table_name SET field1='new value' WHERE id=2";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Delete record
$sql = "DELETE FROM table_name WHERE id=3";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>