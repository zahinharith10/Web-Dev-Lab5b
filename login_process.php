<?php
require 'config.php'; // DB connection + session_start()

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $matric = $_POST['matric'];
    $password = $_POST['password'];

    // STEP 1 — GET USER BY MATRIC
    $stmt = $conn->prepare("SELECT * FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();

    // If matric not found
    if ($result->num_rows == 0) {
        echo "
        <script>
            alert('Invalid matric or password. Try again.');
            window.location.href = 'login.php';
        </script>";
        exit;
    }

    $user = $result->fetch_assoc();

    // STEP 2 — VERIFY HASHED PASSWORD
    if (password_verify($password, $user['password'])) {

        // Login success — create session
        $_SESSION['matric'] = $user['matric'];
        $_SESSION['name']   = $user['name'];
        $_SESSION['role']   = $user['role'];

        echo "
        <script>
            alert('Login successful!');
            window.location.href = 'display_users.php'; // your Q5 page
        </script>";
        exit;

    } else {
        // Wrong password
        echo "
        <script>
            alert('Invalid matric or password. Try again.');
            window.location.href = 'login.php';
        </script>";
        exit;
    }
}
?>
