-- Database: bus_rental_db

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role INT NOT NULL,
    FOREIGN KEY (role) REFERENCES roles(id)
);

CREATE TABLE vehicle_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination_name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE tariffs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination_id INT NOT NULL,
    tariff DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (destination_id) REFERENCES destinations(id)
);

CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type_id INT NOT NULL,
    year YEAR NOT NULL,
    photo VARCHAR(255),
    tariff_id INT NOT NULL,
    FOREIGN KEY (type_id) REFERENCES vehicle_types(id),
    FOREIGN KEY (tariff_id) REFERENCES tariffs(id)
);

CREATE TABLE sliders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    title VARCHAR(255),
    description TEXT
);

CREATE TABLE gps_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_id INT NOT NULL,
    latitude DECIMAL(10,7) NOT NULL,
    longitude DECIMAL(10,7) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id)
);
