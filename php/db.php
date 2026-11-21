<?php
$servername = "localhost";
$dbname = "nacositodb";
$username = "nacosit0";
$password = "Bp2gb#t8u9zEE~rj";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

session_start();

if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(64));
}