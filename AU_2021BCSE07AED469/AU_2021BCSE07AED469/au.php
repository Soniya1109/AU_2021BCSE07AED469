<?php
$servername = "localhost";  
$username = "root";        
$password = "rajan";             
$dbname = "au";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "<p>Message sent successfully!</p>";
} else {
    echo "<p>Error: " . $stmt->error . "</p>";
}

$stmt->close();
$conn->close();
?>
