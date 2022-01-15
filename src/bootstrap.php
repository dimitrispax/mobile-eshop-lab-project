<?php

session_start();
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/libs/helpers.php';
require_once __DIR__ . '/libs/flash.php';
require_once __DIR__ . '/libs/sanitization.php';
require_once __DIR__ . '/libs/validation.php';
require_once __DIR__ . '/libs/filter.php';
require_once __DIR__ . '/libs/connection.php';
require_once __DIR__ . '/auth.php';


$fields = [
    'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
    'email' => 'email | required | email | unique: users, email',
    'password' => 'string | required | secure',
    'password2' => 'string | required | same: password',
    'agree' => 'string | required'
];

// custom messages
$messages = [
    'password2' => [
        'required' => 'Please enter the password again',
        'same' => 'The password does not match'
    ],
    'agree' => [
        'required' => 'You need to agree to the term of services to register'
    ]
];

[$inputs, $errors] = filter($_POST, $fields, $messages);

?>