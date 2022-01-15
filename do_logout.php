<?php

session_start();
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['logged']);
// session_destroy();

header('Location: index.php');
