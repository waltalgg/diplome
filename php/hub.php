<!DOCTYPE html>
<html lang="ru" >
  <head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_reset.css">
    <link rel="stylesheet" href="../css/style_calendar.css">
    <meta charset="utf-8">
    <title> </title>
  </head>
  <body>

    <div class="SCP">
      SCP School
    </div>
    <div class="head">
      <nav>
        <ul>
          <li><a href="#">Курсы</a></li>
          <li><a href="user_profile.php">Новости</a></li>
          <li><a href="form_login.php">Войти</a></li>
        </ul>
      </nav>
    </div>

    <div class="head_calendar">
        Занятия
    </div>
    
      <div class="calendar">
        <?php
        require('calendar.php');
        echo Calendar::getInterval(date('n.Y'), date('n.Y'));

        ?>
    </div>
    <div class="hub">
      <div class="hub_block">
        <div class="content">
            <div class="item_body">
              <p class="hub_block_head">Предмет 1</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
           </div>
    <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
    </div>
        </div>
      </div>

      <div class="hub_block">
        <div class="content">
            <div class="item_body">
              <p class="hub_block_head">Предмет 2</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
           </div>
    <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
    </div>
        </div>
      </div>

      <div class="hub_block">
        <div class="content">
            <div class="item_body">

              <p class="hub_block_head">Предмет 3</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
           </div>
    <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
    </div>
        </div>
      </div>
      <div class="hub_block">
        <div class="content">
            <div class="item_body">
              <p class="hub_block_head">Предмет 4</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
            </div>
      <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
      </div>
        </div>
      </div>
      <div class="hub_block">
        <div class="content">
            <div class="item_body">

                <p class="hub_block_head">Предмет 5</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
           </div>
      <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
      </div>
        </div>
      </div>

      <div class="hub_block">
        <div class="content">
            <div class="item_body">

                <p class="hub_block_head">Предмет 6</p>
                <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
           </div>
    <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
    </div>
        </div>
      </div>
      <div class="hub_block">
        <div class="content">
            <div class="item_body">

                <p class="hub_block_head">Предмет 7</p>
                <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
           </div>
    <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
    </div>
        </div>
      </div>

      <div class="hub_block">
        <div class="content">
            <div class="item_body">

                <p class="hub_block_head">Предмет 8</p>
                <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
           </div>
    <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
    </div>
        </div>
      </div>

      <div class="hub_block">
        <div class="content">
            <div class="item_body">

                <p class="hub_block_head">Предмет 9</p>
                <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla feugiat a quam non blandit.</p>
           </div>
    <div class="hub_footer">
      <a href="#" class="link"><span>Подробнее</span></a>
    </div>
        </div>
      </div>
    </div>
  </body>

</html>
