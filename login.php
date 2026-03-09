<?php include 'db.php'; session_start(); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $voter_id = $_POST['voter_id'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE voter_id='$voter_id' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $_SESSION['voter_id'] = $voter_id;
        header("Location: vote.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>
<form method="post">
    <h3>Login</h3>
    Voter ID: <input type="text" name="voter_id" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
