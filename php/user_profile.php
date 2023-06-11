<?php
session_start();
require('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Профиль учащегося</title>
  <link rel="stylesheet" href="../css/style_calendar.css">
  <link rel="stylesheet" href="../css/style_profile.css">
</head>
<body>
  <div class="top-bar" >
  <a href="index.php" class="logout-button"> Назад на главную </a>
</div>
  <div class="container">
    <h1>Профиль учащегося</h1>
    <img class="profile-picture" src="https://i.pinimg.com/originals/90/2b/f9/902bf9877b2a57498ecfad91bf6471fe.jpg" alt="Фотография профиля">
    <div class="profile-info">
      <div>
        <a class="button" href="#">Редактировать профиль</a>
        <a class="button" style ='background-color: green; margin-left: 5px;' href="account.php"> Личный кабинет </a>
      </div>
    </div>
    <div class="info-row">
      <div class="info-label">id пользователя:</div>
      <div class="info-value"><?=$_SESSION['id_user'];?></div>
    </div>
      <div class="info-row">
        <div class="info-label">Имя профиля:</div>
        <div class="info-value">
          <?php
          $sql = "SELECT username FROM all_users WHERE id_user = '$_SESSION[id_user]'";
          $result = mysqli_query($connect, $sql);
          while ($row = mysqli_fetch_array($result))
          {
              echo $row['username'];
          }
          ?>
        </div>
      </div>
      <div class="info-row">
        <div class="info-label">Email:</div>
        <div class="info-value">
          <?php
          $sql = "SELECT email FROM all_users WHERE id_user = '$_SESSION[id_user]'";
          $result = mysqli_query($connect, $sql);

          while ($row = mysqli_fetch_array($result))
          {
              echo $row['email'];
          }
           ?>
        </div>
      </div>
      <div class="info-row">
        <div class="info-label">Ваши группы:</div>
        <div class="info-value">
          <?php
          $sql = "SELECT name_group FROM all_groups inner join group_content using(id_group) WHERE id_user = '$_SESSION[id_user]'";
          $result = mysqli_query($connect, $sql);
          while ($row = mysqli_fetch_array($result))
          {
              echo $row['name_group']; // Выводит все группы
              echo '<br>';
          }
           ?>
        </div>
      </div>
    </div>
      <br> <br> <br>

      </div>
    </div>
  </div>
</body>
</html>
