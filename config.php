<?php
session_start();

$currentPage = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['matric']) && 
    $currentPage != "login.php" &&
    $currentPage != "login_process.php" &&
    $currentPage != "register.php" &&
    $currentPage != "register_process.php") {

    header("Location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "lab_5b";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
