<?php
$name = $email = $message = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));


    if (empty($name)) {
        $errors["name"] = "Введіть ім'я";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Некоректний email";
    }

    if (strlen($message) < 20) {
        $errors["message"] = "Повідомлення має містити мінімум 20 символів";
    }

    if (empty($errors)) {
        echo "<h2>Повідомлення успішно надіслано!</h2>";
        exit;
    }
}
?>

<form method="post">
    <label>Ім’я:</label><br>
    <input type="text" name="name" value="<?= $name ?>"><br>
    <span style="color:red"><?= $errors["name"] ?? "" ?></span><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= $email ?>"><br>
    <span style="color:red"><?= $errors["email"] ?? "" ?></span><br>

    <label>Повідомлення:</label><br>
    <textarea name="message"><?= $message ?></textarea><br>
    <span style="color:red"><?= $errors["message"] ?? "" ?></span><br><br>

    <button type="submit">Надіслати</button>
</form>
