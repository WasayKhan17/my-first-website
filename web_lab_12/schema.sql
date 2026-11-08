CREATE DATABASE IF NOT EXISTS mydatabase;
USE mydatabase;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    roll_number VARCHAR(50) NOT NULL,
    section VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS student_marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    web_engineering INT NOT NULL,
    database_systems INT NOT NULL,
    grade VARCHAR(5) NOT NULL
);

INSERT INTO student_marks (name, web_engineering, database_systems, grade)
VALUES ('Abdul Wasay', 85, 90, 'A+'), ('Sara Ahmed', 78, 82, 'A');
