<!DOCTYPE html>
<html>
<head>
	<title>Create and Read with PHP and MySQL</title>
</head>
<body>

<h1>Creat and Read with PHP and MySQL</h1>

<!-- Form for creating a new record -->
<form method="post" action="index.php">
	<label for="name">Name:</label><br>
	<input type="text" name="name" id="name"><br>
	<label for="email">Email:</label><br>
	<input type="text" name="email" id="email"><br><br>
	<input type="submit" value="Create" name="create">
</form> 

<?php

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

// If the create form has been submitted
if (isset($_POST['create'])) {
	// Escape user input to prevent SQL injection
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	// Insert the record into the database
	$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

// Read records
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		echo "<br>ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"];
		echo '<br>';
		echo '<a href="index.php?edit=' . $row["id"] . '">Edit</a>';
		echo ' ';
		echo '<a href="index.php?delete=' . $row["id"] . '">Delete</a>';
	}
} else {
	echo "0 results";
}
