<?php
session_start();
include "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
?>

<h3>Pending Stories</h3>

<?php
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE stories SET approved = 1 WHERE id = $id");
}

$result = mysqli_query($conn, "SELECT * FROM stories WHERE approved = 0");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>{$row['content']}</p>";
    echo "<a href='admin.php?approve={$row['id']}'>Approve</a><hr>";
}
?>

<a href="logout.php">Logout</a>
