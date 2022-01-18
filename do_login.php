<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/src/libs/connection.php';

function is_user_active($user) {
    return (int)$user['active'] === 1;
}

function find_user_by_username(string $email) {
    $sql = 'SELECT password, active, email
            FROM users
            WHERE email=:email';

    $statement = db()->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function login(string $email, string $password) {
    $user = find_user_by_username($email);

    if ($user) {
        if(is_user_active($user)) {
            if(password_verify($password, $user['password'])) {
                if(!(session_status() === PHP_SESSION_NONE)) {
                    session_regenerate_id();
                } else {
                    session_start();
                }
    
                // set username in the session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged'] = true;
                header('Location: index.php');
                die();
            } else {
                $_SESSION['login_message'] = "Incorrect password. Please try again.";
                header('Location: login.php');
                die();
            }
        } else {
            $_SESSION['login_message'] = "User is not active. Please activate your account";
            header('Location: login.php');
            die();
        }       
    } else {
        $_SESSION['login_message'] = "User doesn't exist.";
        header('Location: login.php');
        die();
    }
    $_SESSION['login_message'] = "Something bad happened";
    header('Location: login.php');
    die();
}


login($_POST['email'], $_POST['pwd']);