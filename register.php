<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];

    setcookie("email", $_POST['email'], time() + (7 * 24 * 60 * 60));

    header("Location: profile.php");
    exit();
}
?>

<form method="post">
    Ім’я: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Пароль: <input type="password" name="password" required><br>
    <button type="submit">Зареєструватися</button>
</form>