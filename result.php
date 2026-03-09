<?php include 'db.php'; ?>
<h3>Voting Results</h3>
<?php
$sql = "SELECT candidate, COUNT(*) AS votes FROM votes GROUP BY candidate ORDER BY votes DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row['candidate'] . ": " . $row['votes'] . " votes<br>";
}
?>
