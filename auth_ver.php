<?php
$login = $_POST['login'];
$password = $_POST['password'];

$password = md5($password."fjasfsfaisfoasfo124214");

$mysql = new mysqli ("test.local", "root", "", "users");
$result = $mysql->query("SELECT * FROM `account` WHERE `login`='$login' AND `password`='$password'");
$user = $result->fetch_assoc();
if(count($user) == 0){
    echo "no such user found";
    exit();
}

setcookie('user', $user['name'], time() +3600, "/");

header('Location: /Bulls_and_Cows.php');
?>