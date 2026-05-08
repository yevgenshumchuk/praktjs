<?php

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

$dataFile = 'users.json';

function readData($file) {
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }

    $json = file_get_contents($file);
    return json_decode($json, true);
}

function writeData($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

$path = parse_url($request, PHP_URL_PATH);
$path = trim($path, '/');

$parts = array_values(array_filter(explode('/', $path)));

if ($parts[0] === 'php6') {
    array_shift($parts);
}

if ($parts[0] === 'index.php') {
    array_shift($parts);
}

if ($parts[0] !== 'users') {
    http_response_code(404);
    echo json_encode(["message" => "Route not found"]);
    exit;
}

$users = readData($dataFile);

if ($method === 'GET' && count($parts) === 1) {
    echo json_encode($users);
    exit;
}

if ($method === 'GET' && count($parts) === 2) {

    $id = (int)$parts[1];

    foreach ($users as $user) {
        if ($user['id'] == $id) {
            echo json_encode($user);
            exit;
        }
    }

    http_response_code(404);
    echo json_encode(["message" => "User not found"]);
    exit;
}

if ($method === 'POST' && count($parts) === 1) {

    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['name']) || !isset($input['email'])) {
        http_response_code(400);
        echo json_encode(["message" => "Name and email are required"]);
        exit;
    }

    $newId = 1;

    if (!empty($users)) {
        $ids = array_column($users, 'id');
        $newId = max($ids) + 1;
    }

    $newUser = [
        "id" => $newId,
        "name" => $input['name'],
        "email" => $input['email']
    ];

    $users[] = $newUser;

    writeData($dataFile, $users);

    http_response_code(201);
    echo json_encode($newUser);
    exit;
}

if ($method === 'PUT' && count($parts) === 2) {

    $id = (int)$parts[1];

    $input = json_decode(file_get_contents("php://input"), true);

    foreach ($users as &$user) {

        if ($user['id'] == $id) {

            if (isset($input['name'])) {
                $user['name'] = $input['name'];
            }

            if (isset($input['email'])) {
                $user['email'] = $input['email'];
            }

            writeData($dataFile, $users);

            echo json_encode($user);
            exit;
        }
    }

    http_response_code(404);
    echo json_encode(["message" => "User not found"]);
    exit;
}

if ($method === 'DELETE' && count($parts) === 2) {

    $id = (int)$parts[1];

    foreach ($users as $index => $user) {

        if ($user['id'] == $id) {

            array_splice($users, $index, 1);

            writeData($dataFile, $users);

            echo json_encode([
                "message" => "User deleted"
            ]);

            exit;
        }
    }

    http_response_code(404);
    echo json_encode(["message" => "User not found"]);
    exit;
}

http_response_code(404);
echo json_encode(["message" => "Invalid request"]);

?>