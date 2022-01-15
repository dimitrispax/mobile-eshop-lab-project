<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/src/libs/connection.php';

function is_user_active($user)
{
    return (int)$user['active'] === 1;
}

function find_user_by_username(string $email)
{
    $sql = 'SELECT password, active, email
            FROM users
            WHERE email=:email';

    $statement = db()->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function login(string $email, string $password): bool
{
    $user = find_user_by_username($email);

    if ($user && is_user_active($user) && password_verify($password, $user['password'])) {
        // prevent session fixation attack
        if(!(session_status() === PHP_SESSION_NONE)) {
            session_regenerate_id();
        } else {
            session_start();
        }

        // set username in the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['logged'] = true;
        return true;
    }

    return false;
}


if(login($_POST['email'], $_POST['pwd'])) {
    header('Location: index.php');
} else {
    header('Location: login.php');
}