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
        if(!$uppercase) {
            $_SESSION['pas_verify_error'] = "Must contain uppercase letters";
            header('Location: register.php');
            die();
        } 
        if(!$lowercase) {
            $_SESSION['pas_verify_error'] = "Must contain lowercase letters";
            header('Location: register.php');
            die();
        }
        if(!$number) {
            $_SESSION['pas_verify_error'] = "Must contain numbers";
            header('Location: register.php');
            die();
        }
        if(!$specialChars) {
            $_SESSION['pas_verify_error'] = "Must contain special characters";
            header('Location: register.php');
            die();
        }
        if(strlen($password) < 8) {
            $_SESSION['pas_verify_error'] = "Must contain at least 8 characters";
            header('Location: register.php');
            die();
        }

        echo 'Strong password.';
        $_SESSION['pas_verify_error'] = "";
        $activation_code = generate_activation_code();
        if (register_user($_POST['inputFname'], $_POST['inputLname'], $_POST['inputEmail'], $_POST['inputPassword'], $_POST['inputAddress'], $_POST['inputCity'], $_POST['inputPostal'], $_POST['inputPhone'], $activation_code)) {

            // send the activation email
            send_activation_email($_POST['inputEmail'], $activation_code);
            $_SESSION['login_message'] = "Please check your email to activate your account before signing in.";
            header('Location: login.php');
        }
        
    } else {
        $_SESSION['pas_verify_error'] = "You have not entered the same password";
        header('Location: register.php');
        die();
    }

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}


?>