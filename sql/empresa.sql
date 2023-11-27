DROP DATABASE empresa;
CREATE DATABASE IF NOT EXISTS empresa;
USE empresa;
CREATE TABLE IF NOT EXISTS customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    lastName VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(20),
    email VARCHAR(255)
);
SELECT * FROM customer;
