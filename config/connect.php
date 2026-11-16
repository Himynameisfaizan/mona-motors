<?php
if (session_status() === PHP_SESSION_NONE) {
    // session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Database Configuration
$local = true;

if ($local) {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'mona_motors';
    $site = "http://localhost/projects/mona-motors/";
} else {
    $host = 'localhost';
    $username = 'u799879276_mona_motors';
    $password = 'Mona@motors1';
    $dbName = 'u799879276_mona_motors';
    $site = 'https://themonamotors.com/';
}

// Make `$site` global
global $site;

// Create Database Connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check Connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Optional: Set Character Encoding to UTF-8
$conn->set_charset("utf8");