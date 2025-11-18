<?php
require 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $matric   = $_POST['matric'];
    $name     = $_POST['name'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    // Step 1: CHECK IF MATRIC EXISTS
    $stmt = $conn->prepare("SELECT matric FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        echo "
        <script>
            alert('Matric number already exists. Please use another one.');
            window.location.href = 'register.php';
        </script>";
        
        exit;
    }

    // Step 2: HASH PASSWORD
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Step 3: INSERT USER
    $stmt = $conn->prepare("INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $matric, $name, $hashedPassword, $role);

    if ($stmt->execute()) {
        echo "
        <script>
            alert('Registration successful!');
            window.location.href = 'login.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Error: " . $conn->error . "');
            window.location.href = 'register.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
