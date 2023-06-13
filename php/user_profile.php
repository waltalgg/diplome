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

          <?php  if($_SESSION['edit_profile'] != 1)
          {?>
          <a href='edit_profile.php' class='button'>Редактировать профиль</a>
      <?}

       else
          {?>
          <a href='edit_profile.php' class='button'>Отменить редактирование</a>
          <?}?>
        <a class="button" style ='background-color: green; margin-left: 5px;' href="account.php"> Личный кабинет </a>
        <?php  if ($_SESSION['id_user'] == 8)
          {?>
             <a class="button" style ='background-color: orange; margin-left: 5px;' href='admin_panel.php'> Панель админа </a> 
    <? } ?>
      </div>
    </div>
      <?php
      if ($_SESSION['edit_profile'] != 1)
      {?>
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
          <div class="separator"></div>
          <div class="additional-content"></div>
          <div><?php if (isset($_SESSION['success']))
          {
              echo $_SESSION['success'];
              unset($_SESSION['success']);
          }?></div>
        </div>
    <?php  }

    else
    {  ?>
      <form action='edit_profile.php' method="POST">
         <p style='font-size: 14px;'><b>Изменить данные</b></p>
        <input type='hidden' id='id_user' name='id_user'>
        <input type='text' id='new_username' name='new_username' placeholder=
        <?php
        $sql = "SELECT username FROM all_users WHERE id_user = '$_SESSION[id_user]'";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($result))
        {
            echo $row['username'];
        }
         ?> size="30" >
        <input type='text' id='new_email' name='new_email' placeholder= <?php
        $sql = "SELECT email FROM all_users WHERE id_user = '$_SESSION[id_user]'";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($result))
        {
            echo $row['email'];
        }
        ?> size="30" >
        <input type='submit' value='Изменить'>
      </form>
 <?} ?>
      <br> <br> <br>

      </div>
    </div>
  </div>
</body>
</html>
