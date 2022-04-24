<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookflight";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn->connect_error) {
  die("Connection OK: ");
}

$sql = "INSERT INTO MyGuests (Username, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

## to connect to database in cmd use these
## cd c:\xampp\mysql\bin
## mysql -u root
?>

