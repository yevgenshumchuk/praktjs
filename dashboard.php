<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['theme'])) {
    header("Location: preferences.php");
    exit();
}

$username = $_SESSION['username'];
$theme = $_SESSION['theme'];
$color = isset($_COOKIE['favorite_color']) ? $_COOKIE['favorite_color'] : "#ffffff";

$background = ($theme == "dark") ? "#333" : "#fff";
$textColor = ($theme == "dark") ? "#fff" : "#000";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body style="background-color: <?php echo $color; ?>; color: <?php echo $textColor; ?>;">
    <h1>Вітаю, <?php echo htmlspecialchars($username); ?>!</h1>

    <p>Тема: <?php echo $theme; ?></p>
    <p>Ваш улюблений колір: <?php echo $color; ?></p>

    <br>
    <a href="preferences.php">Змінити налаштування</a><br><br>
    <a href="logout.php">Вийти</a>
</body>
</html>