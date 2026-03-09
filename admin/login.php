<?php include '../db.php'; session_start(); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
    } else {
        echo "Invalid admin credentials.";
    }
}
?>
<form method="post">
    <h3>Admin Login</h3>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>
