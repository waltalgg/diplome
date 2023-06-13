<?php session_start();
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Личный кабинет</title>

    <link rel="stylesheet" href="../css/calendar_7day.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      body{background-image: url(../images/back_cal.jpg);}
    </style>
  </head>
  <body>
    <header class="main-header clearfix" role="header">
      <div class="logo">
        <a href="index.php"><em> SCP </em> School </a>
      </div>
      <a href="#menu" class="menu-link"></a>
      <nav id="menu" class="main-nav" role="navigation">

        <ul class="main-menu">
          <li><a class='realtime' style='margin-right: 100px;'>
            <span style='font-size: 14px; color: yellow;'>Cегодня: </span><?php  echo date("d.m.Y"); ?></a></li>
          <li><a href="index.php">Вернуться на главную</a></li>
        </ul>
      </nav>
    </header>

  <div class="info_user">
    <p style='margin-bottom: 2px;'>id пользователя: <?=$_SESSION['id_user'];?> </p>
    <p style='margin-bottom: 2px;'>  Имя пользователя: <a href="user_profile.php">
      <?php
      $sql = "SELECT username FROM all_users WHERE id_user = '$_SESSION[id_user]'";
      $result = mysqli_query($connect, $sql);
      while ($row = mysqli_fetch_array($result))
      {
          echo $row['username'];
      }
      ?> </a>  </p>
      <p style='margin-bottom: 2px;'> Ваши группы: <br>  <?php
      $sql = "SELECT name_group FROM all_groups inner join group_content using(id_group) WHERE id_user = '$_SESSION[id_user]'";
      $result = mysqli_query($connect, $sql);

      while ($row = mysqli_fetch_array($result))
      {
        echo '<p style="margin-bottom: 3px;">';
        echo '<div class="d1" style="background: rgb(0,0,0)"> </div> ';
        echo $row['name_group'];
        echo '</p>';
      }
       ?> </p>
  </div>

	<?php if ($_SESSION['teacher'] == TRUE)
	{
		require('account_teacher.php');
	}
	else
	{
		require('account_student.php');
	}
	?>
  </body>
</html>
