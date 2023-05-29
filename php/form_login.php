<?php
session_start();
require_once 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/style_registration.css">
 <title>Вход</title>

</head>
<body>
  <div class="form_design">
 <form action="sign_in.php" method="post">
  <h1>Вход</h1>
  <div class="form-group">
   <input type="email" id="email" name="email" placeholder=" " required>
   <label for="email">Email</label>
  </div>
  <div class="form-group">
   <input type="password" id="password" name="password" placeholder=" " required>
   <label for="password">Пароль</label>
 </div>
 <div class="login">
   <p style="color: red;"><b><i> <?
   echo $_SESSION['error_mes'];
   unset($_SESSION['error_mes']);
                                 ?></i></b></p>
</div>
 <div class="form-group">
   <input type="submit" value="Войти">
 </div>
    <div class="login">
      <a href="form_registration.php">Регистрация</a>
  </div>
  <div class="login">
     <a href="index.php">Назад на главную</a>
 </div>
</div>
 </form>
</body>
</html>
