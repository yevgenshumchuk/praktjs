<?php
 
header('Content-Type: application/json; charset=UTF-8');
 
define('DATA_FILE', __DIR__ . '/users.json');
 
function readUsers() {
    return json_decode(file_get_contents(DATA_FILE), true) ?? [];
}
 
function writeUsers($users) {
    file_put_contents(DATA_FILE, json_encode(array_values($users), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
 
function nextId($users) {
    if (empty($users)) return 1;
    return max(array_column($users, 'id')) + 1;
}
 
$method = $_SERVER['REQUEST_METHOD'];
$uri = rtrim($_SERVER['PATH_INFO'] ?? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($method === 'GET' && $uri === '/users') {
    http_response_code(200);
    echo json_encode(readUsers(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}
 

if ($method === 'GET' && preg_match('#^/users/(\d+)$#', $uri, $m)) {
    $id = (int)$m[1];
    foreach (readUsers() as $user) {
        if ($user['id'] === $id) {
            http_response_code(200);
            echo json_encode($user, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
    http_response_code(404);
    echo json_encode(['error' => 'Користувача не знайдено']);
    exit;
}
 
// POST /users
if ($method === 'POST' && $uri === '/users') {
    $body = json_decode(file_get_contents('php://input'), true);
 
    if (empty($body['name']) || empty($body['email'])) {
        http_response_code(400);
        echo json_encode(['error' => "Поля name та email обов'язкові"]);
        exit;
    }
 
    $users = readUsers();
    $newUser = [
        'id'    => nextId($users),
        'name'  => $body['name'],
        'email' => $body['email']
    ];
    $users[] = $newUser;
    writeUsers($users);
 
    http_response_code(201);
    echo json_encode($newUser, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}
 
// PUT /users/{id}
if ($method === 'PUT' && preg_match('#^/users/(\d+)$#', $uri, $m)) {
    $id   = (int)$m[1];
    $body = json_decode(file_get_contents('php://input'), true);
    $users = readUsers();
 
    foreach ($users as &$user) {
        if ($user['id'] === $id) {
            if (!empty($body['name']))  $user['name']  = $body['name'];
            if (!empty($body['email'])) $user['email'] = $body['email'];
            writeUsers($users);
            http_response_code(200);
            echo json_encode($user, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
 
    http_response_code(404);
    echo json_encode(['error' => 'Користувача не знайдено']);
    exit;
}
 
if ($method === 'DELETE' && preg_match('#^/users/(\d+)$#', $uri, $m)) {
    $id    = (int)$m[1];
    $users = readUsers();
    $new   = array_filter($users, fn($u) => $u['id'] !== $id);
 
    if (count($new) === count($users)) {
        http_response_code(404);
        echo json_encode(['error' => 'Користувача не знайдено']);
        exit;
    }
 
    writeUsers($new);
    http_response_code(200);
    echo json_encode(['message' => "Користувача з ID {$id} видалено"]);
    exit;
}
 
http_response_code(404);
echo json_encode(['error' => 'Маршрут не знайдено']);
