<?php
include "config.php";

$conn = new mysqli("localhost", "root", "", "lab_5b");

$matric = $_GET['matric'];

// Get existing data
$sql = "SELECT * FROM `users` WHERE matric='$matric'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<div class="container"> <!-- Wrap content in container for styling -->
    <h2>Update User Information</h2>

    <form action="update_process.php" method="POST">

        <label>Matric No:</label>
        <input type="text" name="matric" value="<?php echo $row['matric']; ?>" required>

        <input type="hidden" name="oldMatric" value="<?php echo $row['matric']; ?>">

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

        <label>Access Level:</label>
        <select name="role">
            <option value="student" <?php if($row['role']=="student") echo "selected"; ?>>Student</option>
            <option value="lecturer" <?php if($row['role']=="lecturer") echo "selected"; ?>>Lecturer</option>
        </select>

        <button type="submit">Update</button>

    </form>
</div>

</body>
</html>
