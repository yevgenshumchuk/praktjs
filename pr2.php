<?php

$a = 7;
$b = 12;

echo "<h3>1. Мін/Макс:</h3>";
echo "Макс: " . (($a > $b) ? $a : $b) . "<br>";
echo "Мін: " . (($a < $b) ? $a : $b);

echo "<hr>";



$numbers = [2, 4, 6, 8, 10];
$avg = array_sum($numbers) / count($numbers);

echo "<h3>2. Середнє:</h3>";
echo $avg;

echo "<hr>";



$students = [
    "Вадим" => 85,
    "Женя" => 75,
    "Кідрик" => 90
];

echo "<h3>3. >80:</h3>";
foreach ($students as $name => $grade) {
    if ($grade > 80) {
        echo "$name: $grade<br>";
    }
}

echo "<hr>";



$num = 12;

echo "<h3>4. Кратність:</h3>";
if ($num % 3 == 0 || $num % 5 == 0) {
    echo "Кратне 3 або 5";
} else {
    echo "Не кратне";
}

echo "<hr>";


echo "<h3>5. Таблиця:</h3>";
for ($i = 1; $i <= 10; $i++) {
    echo "7 x $i = " . (7 * $i) . "<br>";
}

?>
