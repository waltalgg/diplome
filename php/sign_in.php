<?php

session_start();
require_once 'connect.php';

$email = mysqli_real_escape_string($connect, $_POST['email']);
$password1 = $_POST['password'];
$password = password_hash($password1, PASSWORD_DEFAULT);
$check_user = mysqli_query($connect, "SELECT * FROM all_users WHERE email = '$email'");


if(mysqli_num_rows($check_user) > 0)
{
  $row =  mysqli_fetch_assoc($check_user);
  if (password_verify($password1, $row['password'])) 
  {
  	$_SESSION['id_user'] = $row['id_user'];
  	$_SESSION['verif'] = 1;
        header('Location: index.php');
        die();
  }

} 

$_SESSION['error_mes'] = "Неверный логин или пароль";
header('Location: form_login.php');


 ?>
