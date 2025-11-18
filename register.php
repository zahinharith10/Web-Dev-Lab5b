<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Register</h2>

<form action="register_process.php" method="POST">
    <label>Matric</label>
    <input type="text" name="matric" required><br>

    <label>Name</label>
    <input type="text" name="name" required><br>

    <label>Password</label>
    <input type="password" name="password" required><br>

    <label>Role</label>
    <select name="role">
        <option value="student">Student</option>
        <option value="lecturer">Lecturer</option>
    </select>

    <button type="submit">Register</button>
</form>

<br>
<a href="login.php">Already have an account?</a>

</div>

</body>
</html>
