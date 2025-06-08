CREATE DATABASE IF NOT EXISTS student_result_system; 
USE student_result_system; 
CREATE TABLE IF NOT EXISTS students ( 
id INT AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(100) UNIQUE NOT NULL, 
password VARCHAR(255) NOT NULL, 
year INT NOT NULL, 
semester INT NOT NULL 
); 
CREATE TABLE IF NOT EXISTS results ( 
id INT AUTO_INCREMENT PRIMARY KEY, 
student_id INT NOT NULL, 
subject1 INT, 
subject2 INT, 
subject3 INT, 
subject4 INT, 
subject5 INT, 
target_cgpa FLOAT, 
FOREIGN KEY (student_id) REFERENCES students(id) 
);