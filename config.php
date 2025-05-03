<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'bus_rental_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
