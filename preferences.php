<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $color = $_POST['color'];
    $theme = $_POST['theme'];

    $_SESSION['username'] = $username;
    $_SESSION['theme'] = $theme;

    setcookie("favorite_color", $color, time() + (86400 * 30), "/");

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Налаштування</title>
</head>
<body>
    <h2>Налаштування користувача</h2>
    <form method="POST">
        <label>Ім'я:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Улюблений колір фону:</label><br>
        <input type="color" name="color" required><br><br>

        <label>Тема:</label><br>
        <select name="theme">
            <option value="light">Світла</option>
            <option value="dark">Темна</option>
        </select><br><br>

        <button type="submit">Зберегти</button>
    </form>
</body>
</html>