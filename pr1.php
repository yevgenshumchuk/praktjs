<?php


$name = "NAZARIYBEEEEEST";
$age = 20;
$is_student = true;

echo "<h3>1. Інформація:</h3>";
echo "Мене звати $name, мені $age років. ";
echo $is_student ? "Я є студентом." : "Я не є студентом.";

echo "<hr>";


$numbers = [1, 2, 3, 4, 5];
$sum = array_sum($numbers);

echo "<h3>2. Сума масиву:</h3>";
echo "Масив: " . implode(", ", $numbers) . "<br>";
echo "Сума: $sum";

echo "<hr>";


$user = [
    "name" => "NAZARIYBEEEEEST",
    "email" => "nazariybeeeeest@example.com",
    "phone" => "+380123456789"
];

echo "<h3>3. Дані користувача:</h3><ul>";
foreach ($user as $key => $value) {
    echo "<li><strong>$key:</strong> $value</li>";
}
echo "</ul>";

echo "<hr>";


echo "<h3>4. Вік:</h3>";
echo ($age > 18) ? "Більше 18" : "18 або менше";

echo "<hr>";



$grade = 85;

echo "<h3>5. Оцінка:</h3>";


if ($grade >= 90) {
    echo "Відмінно";
} elseif ($grade >= 70) {
    echo "Добре";
} elseif ($grade >= 50) {
    echo "Задовільно";
} else {
    echo "Незадовільно";
}

?>
