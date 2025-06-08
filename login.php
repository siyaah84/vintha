<?php 
include 'db.php'; 
session_start(); 
$username = $_POST['username']; 
$password = $_POST['password']; 
$sql = "SELECT * FROM students WHERE username = ?"; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $username); 
$stmt->execute(); 
$result = $stmt->get_result(); 
$user = $result->fetch_assoc(); 
if ($user && password_verify($password, $user['password'])) { 
$_SESSION['student_id'] = $user['id']; 
header("Location: dashboard.html"); 
exit; 
} else { 
echo "Invalid username or password"; 
} 
?>