<?php include '../db.php'; session_start(); if (!isset($_SESSION['admin'])) exit("Unauthorized"); ?>
<h3>Admin Dashboard</h3>
<a href="logout.php">Logout</a>
<form method="post">
    Add Candidate: <input type="text" name="candidate" required>
    <button type="submit">Add</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['candidate'];
    $conn->query("INSERT INTO candidates (name) VALUES ('$name')");
    echo "Candidate added.";
}

$result = $conn->query("SELECT * FROM candidates");
while ($row = $result->fetch_assoc()) {
    echo $row['name'] . "<br>";
}
?>
