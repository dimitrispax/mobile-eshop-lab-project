<?php 

const APP_URL = 'http://localhost/auth';
const SENDER_EMAIL_ADDRESS = 'no-reply@email.com';

// $db = new mysqli("localhost", "root", "root", "eshop", "3306");

function db() {
    $dsn = "mysql:host=localhost;dbname=eshop;charset=UTF8";
    try {
        $pdo = new PDO($dsn, "root", "root");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $pdo;
}

function register_user(string $email, string $username, string $password, string $activation_code, int $expiry = 1 * 24  * 60 * 60, bool $is_admin = false): bool
{
    $sql = 'INSERT INTO users(username, email, pwd, is_admin, activation_code, activation_expiry)
            VALUES(:username, :email, :password, :is_admin, :activation_code,:activation_expiry)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $statement->bindValue(':is_admin', (int)$is_admin);
    $statement->bindValue(':activation_code', password_hash($activation_code, PASSWORD_DEFAULT));
    $statement->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + $expiry));

    return $statement->execute();
}

// function find_user_by_username(string $username)
// {
//     $sql = 'SELECT username, password, active, email
//             FROM users
//             WHERE username=:username';

//     $statement = db()->prepare($sql);
//     $statement->bindValue(':username', $username);
//     $statement->execute();

//     return $statement->fetch(PDO::FETCH_ASSOC);
// }

// function is_user_active($user)
// {
//     return (int)$user['active'] === 1;
// }

// function login(string $username, string $password): bool
// {
//     $user = find_user_by_username($username);

//     if ($user && is_user_active($user) && password_verify($password, $user['password'])) {
//         // prevent session fixation attack
//         session_regenerate_id();

//         // set username in the session
//         $_SESSION['user_id'] = $user['id'];
//         $_SESSION['username'] = $user['username'];

//         return true;
//     }

//     return false;
// }

function generate_activation_code(): string
{
    return bin2hex(random_bytes(16));
}

// function send_activation_email(string $email, string $activation_code): void
// {
//     // create the activation link
//     $activation_link = APP_URL . "/activate.php?email=$email&activation_code=$activation_code";

//     // set email subject & body
//     $subject = 'Please activate your account';
//     $message = <<<MESSAGE
//             Hi,
//             Please click the following link to activate your account:
//             $activation_link
//             MESSAGE;
//     // email header
//     $header = "From:" . SENDER_EMAIL_ADDRESS;

//     // send the email
//     $m = mail($email, $subject, nl2br($message), $header);
//     echo($m);
// }

// function delete_user_by_id(int $id, int $active = 0)
// {
//     $sql = 'DELETE FROM users
//             WHERE id =:id and active=:active';

//     $statement = db()->prepare($sql);
//     $statement->bindValue(':id', $id, PDO::PARAM_INT);
//     $statement->bindValue(':active', $active, PDO::PARAM_INT);

//     return $statement->execute();
// }

// function find_unverified_user(string $activation_code, string $email)
// {

//     $sql = 'SELECT id, activation_code, activation_expiry < now() as expired
//             FROM users
//             WHERE active = 0 AND email=:email';

//     $statement = db()->prepare($sql);

//     $statement->bindValue(':email', $email);
//     $statement->execute();

//     $user = $statement->fetch(PDO::FETCH_ASSOC);

//     if ($user) {
//         // already expired, delete the in active user with expired activation code
//         if ((int)$user['expired'] === 1) {
//             delete_user_by_id($user['id']);
//             return null;
//         }
//         // verify the password
//         if (password_verify($activation_code, $user['activation_code'])) {
//             return $user;
//         }
//     }

//     return null;
// }

// function activate_user(int $user_id): bool
// {
//     $sql = 'UPDATE users
//             SET active = 1,
//                 activated_at = CURRENT_TIMESTAMP
//             WHERE id=:id';

//     $statement = db()->prepare($sql);
//     $statement->bindValue(':id', $user_id, PDO::PARAM_INT);

//     return $statement->execute();
// }


 $activation_code = generate_activation_code();
// register_user($inputs['email'], $inputs['username'], $inputs['password'], $activation_code);
 echo (register_user("harris@gmail.com", "harriskr", "oasfosabnfon", $activation_code));
// send_activation_email("0.0.0.0:1025", $activation_code);


// require 'vendor/autoload.php';


// use PHPMailer\PHPMailer\PHPMailer;
// // use PHPMailer\PHPMailer\Exception;

// // require '/usr/share/php/libphp-phpmailer/src/Exception.php';
// require_once 'mailer/PHPMailer-6.5.3/src/PHPMailer.php';
// // require '/usr/share/php/libphp-phpmailer/src/SMTP.php';
// // require 'vendor/autoload.php';

// // require 'class/class.phpmailer.php';
// $m2 = new PHPMailer;
?>