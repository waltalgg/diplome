<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Личный кабинет</title>

    <link rel="stylesheet" href="../css/calendar_7day.css">
    <link rel="stylesheet" href="../css/style.css">

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
          <li><a href="index.php">Вернуться на главную</a></li>
        </ul>
      </nav>
    </header>

  <div class="info_user">
    Имя пользователя: <a href="user_profile.php"> Иван </a> <br>
    Ваши группы: <br> <div class="d1" style="background: rgb(100,0,0)"> </div> ДБДБ-01  <div class="d1" style="background: rgb(0,100,0)"> </div> ГГН-02
  </div>

  <div class="info_lessons">
      Предстоящие занятия: 5<br>
      Прошедшие занятия: 3
  </div>

    <?php
     require('calendar.php');
    echo $calendar;

    $self_7 = $_SERVER['calendar7'];
    $today_day = date('d').'.'.date('m').'.'.date('y');
    ?>


    <table class="calendar7">
   <thead>
    <tr>
     <th class="data"> </th>
     <th class="data"> <?= $today_day;?></th>
     <th class="data"> 2 мая</th>
     <th class="data"> 3 мая</th>
     <th class="data"> 4 мая</th>
     <th class="data"> 5 мая</th>
     <th class="data"> 6 мая</th>
     <th class="data"> 7 мая</th>
    </tr>
   </thead>
   <tbody>
    <tr>
     <td class="time">8:00</td>
     <td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td>
     <td>
      <div class="subject">
       <div class="name">Предмет 2</div>
       <div class="teacher">Петрова Н.В.</div>
      </div>
     </td>
     <td>
      <div class="subject">
       <div class="name">Предмет 3</div>
       <div class="teacher">Сидоров В.И.</div>
      </div>
     </td>
     <td>
      <div class="subject">
       <div class="name">Предмет 4</div>
       <div class="teacher">Кузнецова О.А.</div>
      </div>
     </td>
     <td>
      <div class="subject">
       <div class="name">Предмет 5</div>
       <div class="teacher">Смирнова Е.В.</div>
      </div>
     </td>
     <td>
       <div class="subject">
      <div class="name">Предмет 6</div>
      <div class="teacher">Бегунов А.И.</div>
     </div>
   </td>
     <td>
       <div class="subject">
      <div class="name">Предмет 7</div>
      <div class="teacher">Носов Г.Р.</div>
     </div>
   </td>
    </tr>
    <tr>
     <td class="time">9:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <td class="time">10:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <td class="time">11:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <td class="time">12:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <td class="time">13:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <td class="time">14:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <td class="time">15:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <td class="time">16:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
    </tr>
    <tr>
     <td class="time">17:00</td>
     <td><td>
      <div class="subject">
       <div class="name">Предмет 1</div>
       <div class="teacher">Иванова Е.А.</div>
      </div>
     </td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <tr>
      <td class="time">18:00</td>
      <td><td>
       <div class="subject">
        <div class="name">Предмет 1</div>
        <div class="teacher">Иванова Е.А.</div>
       </div>
      </td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
     </tr>
    </tr>
   </tbody>
  </table>
  </body>
</html>
