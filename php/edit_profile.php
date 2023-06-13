<?php
session_start();
require('connect.php');
$new_username = $_POST['new_username'];
$new_email = $_POST['new_email'];
if ($_SESSION['edit_profile'] != 1)
{
  $_SESSION['edit_profile'] = 1;
  header('Location: user_profile.php');
}
else
{
      $_SESSION['edit_profile'] = 0;
      if(empty($new_username) AND !empty($new_email))
      {
        $sql = "UPDATE all_users SET email= '$new_email' where id_user = '$_SESSION[id_user]'";
        mysqli_query($connect, $sql);
        $_SESSION['success'] = "Успешно изменено!";
      }
     else if (empty($new_email) AND !empty($new_username))
     {
       $sql = "UPDATE all_users SET username = '$new_username' where id_user = '$_SESSION[id_user]'";
      mysqli_query($connect, $sql);
      $_SESSION['success'] = "Успешно изменено!";
     }
     unset($_POST['new_email']);
     unset($_POST['new_username']);
     header('Location: user_profile.php');
}


?>
