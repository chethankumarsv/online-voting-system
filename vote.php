<?php include 'db.php'; session_start(); ?>
<?php
if (!isset($_SESSION['voter_id'])) {
    header("Location: login.php");
    exit;
}
$voter_id = $_SESSION['voter_id'];

$check = $conn->query("SELECT * FROM votes WHERE voter_id='$voter_id'");
if ($check->num_rows > 0) {
    echo "You have already voted. <a href='result.php'>View Results</a>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $candidate = $_POST['candidate'];
    $conn->query("INSERT INTO votes (voter_id, candidate) VALUES ('$voter_id', '$candidate')");
    echo "Vote submitted! <a href='result.php'>View Results</a>";
    exit;
}

$candidates = $conn->query("SELECT * FROM candidates");
?>
<form method="post">
    <h3>Cast Your Vote</h3>
    <?php while ($row = $candidates->fetch_assoc()): ?>
        <input type="radio" name="candidate" value="<?= $row['name'] ?>" required> <?= $row['name'] ?><br>
    <?php endwhile; ?>
    <button type="submit">Vote</button>
</form>
