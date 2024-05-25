<?php

// Enable output buffering
ob_start();

// Start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Attempt to establish a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $dbname);

// Check if connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Optionally, set character set to UTF-8
mysqli_set_charset($connection, "utf8");

// Optional: define constants for configuration to use across multiple files
define("DB_HOST", $hostname);
define("DB_USER", $username);
define("DB_PASS", $password);
define("DB_NAME", $dbname);

?>
