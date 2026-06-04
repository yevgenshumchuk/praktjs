<?php


$first_name = "Vlad";
$last_name = "Kudryk";
$year_of_birth = 2005;

$age = date("Y") - $year_of_birth;

echo "<h3>1. Дані:</h3>";
echo "$first_name $last_name, $age років";

echo "<hr>";


$countries = ["Україна", "Польща", "Німеччина", "Франція"];

echo "<h3>2. Країни:</h3><ol>";
foreach ($countries as $country) {
    echo "<li>$country</li>";
}
echo "</ol>";

echo "<hr>";



$cities = [
    "Київ" => 3000000,
    "Львів" => 700000,
    "Одеса" => 1000000
];

echo "<h3>3. Міста >1 млн:</h3>";
foreach ($cities as $city => $pop) {
    if ($pop > 1000000) {
        echo "$city: $pop<br>";
    }
}

echo "<hr>";



$number = 8;

echo "<h3>4. Число:</h3>";
echo ($number % 2 == 0) ? "Парне" : "Непарне";

echo "<hr>";


$year = date("Y");

echo "<h3>5. Рік:</h3>";
echo ($year % 4 == 0) ? "Високосний" : "Не високосний";

?>
