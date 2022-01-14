<?php

session_start();

$fName = $_POST['inputFname'];
$lName = $_POST['inputLname'];
$email = $_POST['inputEmail'];
$pwd = $_POST['inputPassword'];
$addr = $_POST['inputAddress'];
$city = $_POST['inputCity'];
$code = $_POST['inputPostal'];
$phone = $_POST['inputPhone'];

$con = new mysqli("localhost", "root", "root", "eshop", "3306");


if (!$con) {
    die("Cannot connect to DB");
}

$hash = password_hash($pwd, PASSWORD_DEFAULT);
$stmt = $con->prepare("INSERT INTO users(firstName, lastName, email, pwd, addr, city, pcode, phone) VALUES(?,?,?,?,?,?,?,?)");
if(!$stmt) {
    $_SESSION['message'] = 'Internal Error!';
    header('Location: login.php');
    exit;
}

$stmt->bind_param("ssssssss", $fName, $lName, $email, $hash, $addr, $city, $code, $phone);

$result = $stmt->execute();

if ($result === false) {
    die("Query failed: {$con->error}");
}

echo "Inserted {$con->affected_rows} rows";

$_SESSION['message'] = 'You have been registered! You can now login..!';

header('Location: index.php')
 

?>