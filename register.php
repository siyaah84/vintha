<?php 
include 'db.php'; 
$username = $_POST['username']; 
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
$year = $_POST['year']; 
$semester = $_POST['semester']; 
$sql = "INSERT INTO students (username, password, year, semester) VALUES (?, ?, ?, ?)"; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ssii", $username, $password, $year, $semester); 
if ($stmt->execute()) { 
echo "Registration successful!"; 
} else { 
echo "Error: " . $stmt->error; 
} 
?>