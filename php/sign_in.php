<?php

session_start();
require_once 'connect.php';

$email = $_POST['email'];
$password1 = $_POST['password'];
$password = password_hash($password1, PASSWORD_DEFAULT);
$check_user = mysqli_query($connect, "SELECT * FROM 'all_users' WHERE 'email' = '$email' AND 'password' = '$password'");

if(mysqli_num_rows($check_user) > 0)
{
  header('Location: index.php');
}
else
{
  $SESSION['error_mes'] = "Неверный логин или пароль";
  header('Location: form_login.php');
}

 ?>
