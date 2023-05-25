<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/style_registration.css">
 <title>Регистрация</title>

</head>
<body>
  <div class="form_design">
 <form action="reg_in.php" method="post">
  <h1>Регистрация</h1>
  <div class="form-group">
   <input type="text" id="username" name="username" placeholder=" " required>
   <label for="username">Имя пользователя</label>
  </div>
  <div class="form-group">
   <input type="email" id="email" name="email" placeholder=" " required>
   <label for="email">Email</label>
  </div>
  <div class="form-group">
   <input type="password" id="password" name="password" placeholder=" " required>
   <label for="password">Пароль</label>
 </div>
 <div class="form-group">
   <input type="submit" value="Зарегистрироваться">
 </div>
    <div class="login">
      <a href="form_login.php">Войти</a>
  </div>
  <div class="login">
     <a href="index.php">Назад на главную</a>
 </div>
</div>
 </form>
</body>
</html>
