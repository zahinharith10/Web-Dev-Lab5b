<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Login</h2>

<form action="login_process.php" method="POST">
    <label>Matric</label>
    <input type="text" name="matric" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>

<br>
<a href="register.php">Create New Account</a>
</div>

</body>
</html>
