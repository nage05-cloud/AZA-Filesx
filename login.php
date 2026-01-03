<?php
session_start();
include "db.php";

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
    } else {
        echo "Wrong login";
    }
}
?>

<form method="POST">
    <input name="username" placeholder="Admin"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button>Login</button>
</form>
