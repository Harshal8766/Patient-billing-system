 <?php
$host = "localhost";
$user = "root";   // default for XAMPP
$pass = "";       // default for XAMPP
$db   = "hospital_db"; 

// Create a new mysqli connection object
$conn = new mysqli($host, $user, $pass, $db);

// Check for a connection error and terminate if it fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
