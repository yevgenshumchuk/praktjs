<?php


$p1 = 200;
$p2 = 300;
$p3 = 150;

$total = $p1 + $p2 + $p3;

echo "<h3>1. Сума покупки:</h3>";
echo "Загальна сума: $total грн";

echo "<hr>";



$films = ["Inception", "Titanic", "Avatar", "Matrix", "Interstellar"];

echo "<h3>2. Фільми:</h3>";
foreach ($films as $film) {
    echo "$film<br>";
}

echo "<hr>";


$user = [
    "login" => "admin",
    "password" => "1234",
    "email" => "admin@mail.com"
];

echo "<h3>3. Дані:</h3>";
foreach ($user as $key => $value) {
    echo "$key: $value<br>";
}

echo "<hr>";



if ($total > 500) {
    $discount = $total * 0.10;
    $final = $total - $discount;
} else {
    $final = $total;
}

echo "<h3>4. Підсумок:</h3>";
echo "До оплати: $final грн";

echo "<hr>";



$input_login = "admin";
$input_password = "1234";

echo "<h3>5. Вхід:</h3>";
if ($input_login === $user["login"] && $input_password === $user["password"]) {
    echo "Успішний вхід";
} else {
    echo "Невірні дані";
}

?>
