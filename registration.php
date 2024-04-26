<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = json_decode(file_get_contents('data.json'), true);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    if ($password !== $confirm_password) {
        echo json_encode(['error' => 'Пароли не совпадают']);
        exit;
    }

    foreach ($users as $user) {
        if ($user['username'] == $username || $user['email'] == $email) {
            echo json_encode(['error' => 'Пользователь уже существует']);
            exit;
        }
    }

    $password = md5($password . 'salt'); // Пример использования "соли" с md5
    $users[] = ['username' => $username, 'password' => $password, 'email' => $email, 'name' => $name];
    file_put_contents('data.json', json_encode($users));

    echo json_encode(['success' => 'Вы успешно зарегистрированы']);
}
?>
