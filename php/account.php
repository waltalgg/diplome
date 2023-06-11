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
      $sql = "SELECT name_group FROM all_groups inner join group_content ON id_user = '$_SESSION[id_user]'";
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

  <div class="info_user" style="width:20%; height:150px; margin-bottom: 0; margin-left: 18%;">
    <p style='margin-bottom: 10px; font-size: 20px;'><b> <i>Выберите группу:</i> </b> </p>
    <form method='get'>
  	<select name='id_group'>

  		<?php
  		$id_group = $_GET['id_group'];
  		$selected = '';
  		if ($id_group == 0) $selected = 'selected';
  		echo "<option value='0' $selected>Не выбрано</option>";
  		$sql_group = 'SELECT * FROM all_groups where deleted_group = false AND id_group != 1';
  		$group_query = mysqli_query($connect, $sql_group);
  		while($row =  mysqli_fetch_assoc($group_query) )
  		{
  		$selected = '';
  		if ($id_group == $row['id_group']) $selected = 'selected';
  		 echo "<option value='{$row['id_group']}' $selected>{$row['name_group']}</option>";
  		}
  		?>

  	</select>

  	<input type="submit" value="Выбрать группу"></input>
   </form>
   <p style='margin-top: 20px;'>  Предстоящие занятия: </p>
   <p style='margin-top: 5px;'>   Прошедшие занятия:  </p>
  </div>
</div>

    <?php
     if(isset($_GET['month']))  $month = $_GET['month'];
     else $month = date('m');

     if(isset($_GET['year']))  $year = $_GET['year'];
     else $year = date('Y');


    if ( isset( $_GET['start_date2']) ){
       $start_date2 =  $_GET['start_date2']  ;
       $end_date2 = date('Y-m-d', strtotime($_GET['start_date2'].' +6 days'));
    }
    else{
       $day = date('w')-1;
       $start_date2 = date('Y-m-d', strtotime('-'.$day.' days'));
       $end_date2 = date('Y-m-d', strtotime('+'.(6-$day).' days'));
    }


    require('calendar.php');
    echo $calendar;

    if ( empty($id_group))
    {
	    $sql_calendar7 = "SELECT *, DAYOFWEEK(date_lesson) as dow, HOUR(date_lesson) as h
 FROM all_lessons ".
		 "where id_teacher ={$_SESSION['id_user']} AND ".
		 "date_lesson between '$start_date2' and '$end_date2' ";
    }
    else
    {
    	$sql_calendar7 = "SELECT *, DAYOFWEEK(date_lesson) as dow, HOUR(date_lesson) as h FROM all_lessons inner join all_users ON id_teacher = id_user ".
		 "where (id_teacher ={$_SESSION['id_user']} OR id_group = $id_group) AND ".
		 "date_lesson between '$start_date2' and '$end_date2' ";

    }

    $result = mysqli_query($connect, $sql_calendar7);
    $lessons = array();
    while($row =  mysqli_fetch_assoc($result))
    {
    	$dow = $row['dow'];
    	$h = $row['h'];
    	if (!isset($lessons[$dow]))
    	{
    	$lessons[$dow] = array();
    	}
    	$lessons[$dow][$h] = $row;

    }



    echo "
    <table class='calendar7'>
    <thead>
    <div style='width: 10%; margin-left: 90%;  '>

	</div>
	<div style='width: 10%;  margin-left: 20%; '>

	</div>
    <tr>
     <th class='data'> <a href='?month={$month}&year={$year}&start_date2=".date('Y-m-d', strtotime($start_date2.' -7 days'))."'>
     <img src='../images/strelka2.png' width = 40px > </a> </th>
     <th class='data'>".date('d.m.y', strtotime($start_date2))."</th>
     <th class='data'>".date('d.m.y', strtotime($start_date2.' +1 days'))."</th>
     <th class='data'>".date('d.m.y', strtotime($start_date2.' +2 days'))."</th>
     <th class='data'>".date('d.m.y', strtotime($start_date2.' +3 days'))."</th>
     <th class='data'>".date('d.m.y', strtotime($start_date2.' +4 days'))."</th>
     <th class='data'>".date('d.m.y', strtotime($start_date2.' +5 days'))."</th>
     <th class='data'>".date('d.m.y', strtotime($start_date2.' +6 days'))."</th>
     <th class='data'><a href='?month={$month}&year={$year}&start_date2=".date('Y-m-d', strtotime($start_date2.' +7 days'))."'><img src='../images/strelka1.png' width = 40px > </a></th>
    </tr>
   </thead>";
    for($h = 9; $h <= 20; $h++)
    {
    	echo "<tr>
    	<td class='time'>$h:00</td>";

    	for($j = 1; $j <= 7; $j++)
    	{
    	$id_lesson = '';
    	$name = '';
    	$teacher = '';
    	$content = '';
    	$text_lesson = '';
    	$link_lesson = '';
    	if(isset($lessons[$j]) && isset($lessons[$j][$h]))
    	{
    	   $name = $lessons[$j][$h]['name_lesson'];
    	   $teacher = $lessons[$j][$h]['username'];
    	   $id_lesson = $lessons[$j][$h]['id_lesson'];
    	   $text_lesson = $lessons[$j][$h]['text_lesson'];
    	   $link_lesson = $lessons[$j][$h]['link_lesson'];
    	   $content = "
    	<div class='subject'>
       <div class='name'> $name </div>
       <div class='teacher'> $teacher </div>
      </div>";
    	}
    	 echo "<td onclick='fill(`{$id_lesson}`, `{$name}`, `{$text_lesson}`, `{$link_lesson}`)'>{$content}</td>";
    	}
    	echo "<td class='time'>$h:00</td>";
    	echo "</tr>";
    }
    echo "
    </table>";


    ?>
<div class='calendar7' id='modal' style='display:none;position: fixed; /* or absolute */
    top: 50%;
    left: 50%;
    width: 200px;
    height:100px;
    border: 1px solid;
    background-color: white;'>
	<form >
	   <p style='font-size: 14px;'><b>Создание занятия</b></p>
	  <input type='hidden' id='id_lesson' name='id_lesson'>
	  <input type='text' id='name_lesson' name='name_lesson' placeholder= "Название занятия" size="30" >
	  <p style='font-size: 14px;'> <i>Текст занятия </i></p> <textarea id='text_lesson' name='text_lesson'> </textarea>
	  <input type='text' id='link_lesson' name='link_lesson' placeholder= "Ссылка на занятие">
	  <input type='submit' value='Сохранить'>
	  <input type='button' value='Отменить' onclick='modal.style.display = `none` '>
	</form>
</div>

<script>
 function fill(vid_lesson, vname_lesson, vtext_lesson, vlink_lesson){
    name_lesson.value = vname_lesson;
    id_lesson.value = vid_lesson;
    text_lesson.value = vtext_lesson;
    link_lesson.value = vlink_lesson;
    modal.style.display = null;
 }

</script>
  </body>
</html>
