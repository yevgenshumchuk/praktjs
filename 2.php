<?php


$a = 5;
$b = 10;

echo "<h3>1. Арифметика:</h3>";
echo "Сума: " . ($a + $b) . "<br>";
echo "Різниця: " . ($a - $b) . "<br>";
echo "Добуток: " . ($a * $b) . "<br>";
echo "Ділення: " . ($a / $b);

echo "<hr>";



$days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

echo "<h3>2. Дні:</h3>";
echo "3-й день: $days[2]<br>";
echo "5-й день: $days[4]";

echo "<hr>";



$products = [
    "Phone" => 10000,
    "Laptop" => 25000,
    "Tablet" => 15000
];

echo "<h3>3. Товари:</h3>";
foreach ($products as $name => $price) {
    echo "$name: $price грн<br>";
}

echo "<hr>";



$day = "Monday";

echo "<h3>4. День:</h3>";
switch ($day) {
    case "Monday":
        echo "Початок тижня";
        break;
    case "Friday":
        echo "Майже вихідні";
        break;
    default:
        echo "Звичайний день";
}

echo "<hr>";



$x = 15;

echo "<h3>5. Число:</h3>";
echo ($x % 2 == 0) ? "Парне" : "Непарне";

?>
