<?php include 'db.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $voter_id = $_POST['voter_id'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users (name, voter_id, password) VALUES ('$name', '$voter_id', '$password')";
    $conn->query($sql);
    echo "Registered successfully. <a href='login.php'>Login</a>";
}
?>
<form method="post">
    <h3>Register</h3>
    Name: <input type="text" name="name" required><br>
    Voter ID: <input type="text" name="voter_id" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
