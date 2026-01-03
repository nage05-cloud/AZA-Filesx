CREATE DATABASE azafiles;

USE azafiles;

CREATE TABLE stories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT,
    likes INT DEFAULT 0,
    approved INT DEFAULT 0
);

CREATE TABLE admin (    
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);
