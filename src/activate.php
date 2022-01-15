<?php

require __DIR__ . '/bootstrap.php';

function activate_user(int $user_id): bool
{
    $sql = 'UPDATE users
            SET active = 1,
                activated_at = CURRENT_TIMESTAMP
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $user_id, PDO::PARAM_INT);

    return $statement->execute();
}

if (is_get_request()) {

    // sanitize the email & activation code
    [$inputs, $errors] = filter($_GET, [
        'email' => 'string | required | email',
        'activation_code' => 'string | required'
    ]);

    if (!$errors) {

        $user = find_unverified_user($inputs['activation_code'], $inputs['email']);

        // if user exists and activate the user successfully
        if ($user && activate_user($user['id'])) {
            redirect_with_message(
                '../index.php',
                'You account has been activated successfully. Please login here.'
            );
        }
    }
}

echo($user);

?>