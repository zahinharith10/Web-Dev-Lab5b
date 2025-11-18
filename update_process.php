<?php
include "config.php";

$conn = new mysqli("localhost", "root", "", "lab_5b");

$oldMatric = $_POST['oldMatric'];  // original matric
$matric = $_POST['matric'];        // new matric
$name = $_POST['name'];
$role = $_POST['role'];

$sql = "UPDATE `users`
        SET matric='$matric', name='$name', role='$role'
        WHERE matric='$oldMatric'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Record updated successfully!');
            window.location.href='display_users.php';
          </script>";
} else {
    echo "<script>
            alert('Error updating record: " . addslashes($conn->error) . "');
            window.history.back();
          </script>";
}

$conn->close();
?>
