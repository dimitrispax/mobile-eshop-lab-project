<?php

require __DIR__ . '/src/bootstrap.php';

$errors = [];
$inputs = [];

if (is_post_request()) {
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

    if ($errors) {
        echo $errors;
    }

    // Given password
    $password = $_POST['inputPassword'];
    $rePassword = $_POST['inputRePassword'];

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if($password === $rePassword) {

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            header('Location: register.php');
        } else {
            echo 'Strong password.';
            $activation_code = generate_activation_code();
        // function register_user(string $email, string $username, string $password, string $activation_code, int $expiry = 1 * 24  * 60 * 60, bool $is_admin = false): bool
            if (register_user($_POST['inputFname'], $_POST['inputLname'], $_POST['inputEmail'], $_POST['inputPassword'], $_POST['inputAddress'], $_POST['inputCity'], $_POST['inputPostal'], $_POST['inputPhone'], $activation_code)) {

                // send the activation email
                send_activation_email($_POST['inputEmail'], $activation_code);

                redirect_with_message(
                    'login.php',
                    'Please check your email to activate your account before signing in'
                );
            }
        }
    } else {
        header('Location: register.php');
    }

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}


?>