<?php
$name = $age = $gender = $about = "";
$hobbies = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    $name = htmlspecialchars(trim($_POST["name"]));
    $age = trim($_POST["age"]);
    $gender = $_POST["gender"] ?? "";
    $about = htmlspecialchars(trim($_POST["about"]));
    $hobbies = $_POST["hobbies"] ?? [];

    if (empty($name)) {
        $errors["name"] = "Введіть ім'я";
    }

    if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 10 || $age > 100) {
        $errors["age"] = "Вік має бути числом від 10 до 100";
    }

    if (empty($gender)) {
        $errors["gender"] = "Оберіть стать";
    }


    if (empty($errors)) {
        echo "<h2>Анкета успішно надіслана!</h2>";

        echo "Ім’я: $name <br>";
        echo "Вік: $age <br>";
        echo "Стать: $gender <br>";
        echo "Хобі: " . htmlspecialchars(implode(", ", $hobbies)) . "<br>";
        echo "Про себе: $about <br>";
        exit;
    }
}
?>

<form method="post">
    <label>Ім’я:</label><br>
    <input type="text" name="name" value="<?= $name ?>"><br>
    <span style="color:red"><?= $errors["name"] ?? "" ?></span><br>

    <label>Вік:</label><br>
    <input type="text" name="age" value="<?= htmlspecialchars($age) ?>"><br>
    <span style="color:red"><?= $errors["age"] ?? "" ?></span><br>

    <label>Стать:</label><br>
    <input type="radio" name="gender" value="Чоловік" <?= $gender=="Чоловік"?"checked":"" ?>> Чоловік
    <input type="radio" name="gender" value="Жінка" <?= $gender=="Жінка"?"checked":"" ?>> Жінка<br>
    <span style="color:red"><?= $errors["gender"] ?? "" ?></span><br>

    <label>Хобі:</label><br>
    <input type="checkbox" name="hobbies[]" value="Спорт" <?= in_array("Спорт",$hobbies)?"checked":"" ?>> Спорт
    <input type="checkbox" name="hobbies[]" value="Музика" <?= in_array("Музика",$hobbies)?"checked":"" ?>> Музика
    <input type="checkbox" name="hobbies[]" value="Ігри" <?= in_array("Ігри",$hobbies)?"checked":"" ?>> Ігри<br><br>

    <label>Про себе:</label><br>
    <textarea name="about"><?= $about ?></textarea><br><br>

    <button type="submit">Надіслати</button>
</form>
