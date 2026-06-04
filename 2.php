<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Генератор паролів</title>
</head>
<body>

<h2>Генератор безпечних паролів</h2>

<form method="post">
    Кількість:<br>
    <input type="number" name="count" required><br><br>

    Довжина:<br>
    <input type="number" name="length" required><br><br>

    <button type="submit">Згенерувати</button>
</form>

<?php
function generatePassword($length){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = "";

    for($i = 0; $i < $length; $i++){
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }

    return $password;
}

function isStrongPassword($password){
    if(strlen($password) < 8) return false;
    if(!preg_match("/[A-Z]/", $password)) return false;
    if(!preg_match("/[0-9]/", $password)) return false;
    return true;
}

function generateStrongPasswords($count, $length, $callback){
    $result = [];

    while(count($result) < $count){
        $pass = generatePassword($length);

        if($callback($pass)){
            $result[] = $pass;
        }
    }

    return $result;
}

if(isset($_POST["count"]) && isset($_POST["length"])){
    $count = (int)$_POST["count"];
    $length = (int)$_POST["length"];

    $passwords = generateStrongPasswords($count, $length, "isStrongPassword");

    echo "<h3>Результат:</h3>";
    foreach($passwords as $p){
        echo "<div>$p</div>";
    }
}
?>

</body>
</html>
