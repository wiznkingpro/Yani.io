<?php
session_start();
require "includes/db_connect.php";


$email = $_POST['email'];
$one_password = $_POST['password'];
$md5pass = md5($one_password);

$query = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$md5pass}' ");

if (mysqli_num_rows($query) == 1) {
  $user = mysqli_fetch_assoc($query);
  $user_id = $user['user_id'];

  $_SESSION['user'] = [
    "user_id" => $user_id,
    "email" => $user['email'],
    "nick" => $user['nick']
  ];

  $cookie_name = "cookie_login";
  $cookie_value = $user_id;
  $cookie_expire = time() + (365 * 24 * 60 * 60);
  setcookie($cookie_name, $cookie_value, $cookie_expire, "/");

  header("Location: profil");
} else {
  header("Location: log-in");
  echo("Ошибка: Неправильный Email или Пароль");
}