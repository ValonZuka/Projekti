-- Create the database
CREATE DATABASE rvstudio;

-- Use the database
USE rvstudio;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create stages table
CREATE TABLE stages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Stage INT,
    SQ_FT INT,
    Dimensions VARCHAR(50),
    Grid_Height VARCHAR(50),
    Power VARCHAR(50),
    Office_Support VARCHAR(50),
    Specifications TEXT,
    available BOOLEAN NOT NULL DEFAULT TRUE
);

-- Create cars table
CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    year INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    available BOOLEAN NOT NULL DEFAULT TRUE
);

-- Create rentals table
CREATE TABLE rentals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    rental_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    stage_id INT DEFAULT NULL,
    car_id INT DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (stage_id) REFERENCES stages(id),
    FOREIGN KEY (car_id) REFERENCES cars(id)
);
