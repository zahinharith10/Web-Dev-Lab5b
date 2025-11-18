<?php
include "config.php";

$matric = $_GET['matric'];

$conn->query("DELETE FROM users WHERE matric='$matric'");

header("Location: display_users.php");
?>
