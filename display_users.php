<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<a class="logout" href="logout.php">Logout</a>

<h2>User List</h2>

<table>
    <tr>
        <th>Matric</th>
        <th>Name</th>
        <th>Role</th>
        <th>Action</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM users");

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['matric']}</td>
                <td>{$row['name']}</td>
                <td>{$row['role']}</td>
                <td class='action-btn'>
                    <a href='update_user.php?matric={$row['matric']}'>Update</a>
                    <a href='delete_user.php?matric={$row['matric']}' 
                       onclick=\"return confirm('Are you sure you want to delete this user?');\">
                       Delete
                    </a>
                </td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
