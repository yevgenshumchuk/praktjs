<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Користувачі</title>
    <style>
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>

<?php
$users = [
    ["name" => "Олександр", "age" => 21, "email" => "alex@gmail.com"],
    ["name" => "Іван", "age" => 17, "email" => "ivan@gmail.com"],
    ["name" => "Марія", "age" => 19, "email" => "maria@gmail.com"],
    ["name" => "Петро", "age" => 25, "email" => "petro@gmail.com"],
    ["name" => "Андрій", "age" => 16, "email" => "andriy@gmail.com"],
    ["name" => "Катерина", "age" => 30, "email" => "kate@gmail.com"],
    ["name" => "Богдан", "age" => 18, "email" => "bogdan@gmail.com"],
    ["name" => "Дмитро", "age" => 22, "email" => "dima@gmail.com"],
    ["name" => "Юлія", "age" => 20, "email" => "yulia@gmail.com"],
    ["name" => "Назар", "age" => 23, "email" => "nazar@gmail.com"]
];

function filterAdults($users){
    return array_filter($users, function($u){
        return $u["age"] >= 18;
    });
}

function compareByNameLength($a, $b){
    return mb_strlen($a["name"]) <=> mb_strlen($b["name"]);
}

$filtered = filterAdults($users);
usort($filtered, "compareByNameLength");
?>

<h2>Користувачі 18+ (сортування за довжиною імені)</h2>

<table>
    <tr>
        <th>Ім’я</th>
        <th>Вік</th>
        <th>Email</th>
    </tr>

    <?php foreach($filtered as $u): ?>
    <tr>
        <td><?= $u["name"] ?></td>
        <td><?= $u["age"] ?></td>
        <td><?= $u["email"] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
