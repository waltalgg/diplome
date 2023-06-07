<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../css/style_calendar.css">
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>

    <header class="main-header clearfix" role="header">
      <div class="logo">
        <a href="#"><em> SCP </em> School </a>
      </div>
      <a href="#menu" class="menu-link"></a>
      <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
          <li><a href="user_profile.php">Профиль (ь)</a></li>
          <li><a href="account.php">Кабинет</a></li>
          <li><a href="form_login.php">Войти</a></li>
        </ul>
      </nav>
    </header>

    <div id="news" class="news">
      <h2 style="text-align: center;">Последние новости</h2>
      <p style="text-align: center;">Последние и актуальные новости о нашей школе.</p>

      <div class="news-template">
        <h3><a href="#">Заголовок новости</a></h3>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiustion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in r</p>
        <small> Дата: 01.01.2023</small>
      </div>
      <div class="news-template">
        <h3><a href="#">Заголовок новости</a></h3>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiustion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in r</p>
        <small> Дата: 01.01.2023</small>
      </div>
      <div class="news-template">
        <h3><a href="#">Заголовок новости</a></h3>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiustion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in r</p>
        <small> Дата: 01.01.2023</small>
      </div>

    </div>

    <div id="courses" class="courses-block">
      <div class="course">
        <h3><a href="#">Курс по HTML и CSS</a></h3>
        <div class="course-block">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
           incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          rure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
          in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>

      <div class="course">
        <h3><a href="#">Курс по JavaScript</a></h3>
        <div class="course-block">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
           incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          rure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
          in culpa qui officia deserunt mollit anim id est laborum.
      </div>
    </div>

      <div class="course">
        <h3><a href="#">Курс по Python</a></h3>
        <div class="course-block">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
           incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          rure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
          in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>


    <div class="calendar">
      <p class="calendar-z"> Календарь занятий:</p>
      <?php
      require('calendar.php');
      echo Calendar::getInterval(date('n.Y'), date('n.Y'));
      ?>
    </div>

    <br><br><br><br>  <br><br><br><br>

  </body>
</html>
