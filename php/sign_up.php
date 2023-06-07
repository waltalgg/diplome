<?php
  session_start();
  require_once 'connect.php';

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password1 = $_POST['password'];
  $password_c = $_POST['password_c'];

  if ($password1 === $password_c)
  {
    $password =  password_hash($password1, PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO all_users (id_user, username, email, password) VALUES (NULL, '$username', '$email', '$password')");
    header('Location: index.php');
  }
  else
  {
    $_SESSION['error_mes'] = "Пароли не совпадают!";
    header('Location: form_registration.php');
  }
 ?>
