<?php
require_once __DIR__ . '/../config.php';

try {
    // Use the existing PDO instance from config.php
    // $pdo is already created in config.php
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}
?>
