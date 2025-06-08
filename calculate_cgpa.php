<?php 
include 'db.php'; 
session_start(); 
$student_id = $_SESSION['student_id']; 
$s1 = $_POST['subject1']; 
$s2 = $_POST['subject2']; 
$s3 = $_POST['subject3']; 
$s4 = $_POST['subject4']; 
$s5 = $_POST['subject5']; 
$target = $_POST['target_cgpa']; 
$sql = "INSERT INTO results (student_id, subject1, subject2, subject3, subject4, subject5, 
target_cgpa) 
VALUES (?, ?, ?, ?, ?, ?, ?)"; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("iiiiiid", $student_id, $s1, $s2, $s3, $s4, $s5, $target); 
if ($stmt->execute()) { 
$total = $s1 + $s2 + $s3 + $s4 + $s5; 
$cgpa = ($total / 500) * 10; 
echo "Your CGPA is " . round($cgpa, 2) . ".<br>"; 
if ($cgpa < $target) { 
$needed = ((($target / 10) * 500) - $total) / 5; 
echo "To reach your target CGPA of " . $target . ", you need to get average " . 
round($needed, 2) . " marks in future subjects."; 
} else { 
echo "Congratulations! You have achieved your target CGPA."; 
} 
} else { 
echo "Error: " . $stmt->error; 
} 
?>