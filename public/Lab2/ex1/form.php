<?php
$username = $_COOKIE["name"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <input type="submit" name="action" value="save">
    </form>
    <h1>Hello <?= $username ?></h1>
    <form action="index.php" method="post">
        <button type="submit" name="action" value="delete">
            Clear cooke
        </button>
    </form>
</body>
</html>
