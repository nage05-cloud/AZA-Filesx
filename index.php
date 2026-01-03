<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Anonymous Stories</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
<h3>Send a Story</h3>

<form method="POST">
    <textarea name="story" required></textarea><br><br>
    <button type="submit">Send</button>
</form>

<?php
if (isset($_POST['story'])) {
    $story = $_POST['story'];
    mysqli_query($conn, "INSERT INTO stories (content) VALUES ('$story')");
    echo "<p>Story submitted!</p>";
}
?>
</div>

<div class="box">
<h3>Stories</h3>

<?php
if (isset($_POST['like'])) {
    $id = $_POST['like'];
    mysqli_query($conn, "UPDATE stories SET likes = likes + 1 WHERE id = $id");
}

$result = mysqli_query($conn, "SELECT * FROM stories WHERE approved = 1");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>{$row['content']}</p>";
    echo "<form method='POST'>
            <button name='like' value='{$row['id']}'>
                ❤️ {$row['likes']}
            </button>
          </form><hr>";
}
?>
</div>

</body>
</html>
