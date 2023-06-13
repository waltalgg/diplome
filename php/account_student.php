<?php session_start();
require('connect.php');?>
<div class="info_user" style="width:20%; height:150px; margin-bottom: 0; margin-left: 18%;">
    <p style='margin-bottom: 10px; font-size: 20px; text-align: center;'><b><i>Ваши группы</i> </b> </p>
    <form method='get'>
  	<select name='select_id_group'>

  		<?php
  		$id_group = $_GET['select_id_group'];
  		$selected = '';
  		if ($id_group == 0) $selected = 'selected';
  		echo "<option value='0' $selected> Все группы </option>";
  		$sql_group = "SELECT * FROM all_groups inner join group_content using(id_group) where deleted_group = false AND id_user = {$_SESSION['id_user']}";
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
  </div>
</div>

    <?php
     if(isset($_GET['month']))  $month = $_GET['month'];
     else $month = date('m');

     if(isset($_GET['year']))  $year = $_GET['year'];
     else $year = date('Y');


    if ( isset( $_GET['start_date2']) )
    {
       $start_date2 =  $_GET['start_date2'];
       $end_date2 = date('Y-m-d', strtotime($_GET['start_date2'].' +6 days'));
    }
    else
    {
       $day = date('w')-1;
       $start_date2 = date('Y-m-d', strtotime('-'.$day.' days'));
       $end_date2 = date('Y-m-d', strtotime('+'.(6-$day).' days'));
    }


    require('calendar.php');
    echo $calendar;

    if ( empty($id_group))
    {
	    $sql_calendar7 = "SELECT *, DAYOFWEEK(date_lesson) as dow, HOUR(date_lesson) as h
 FROM all_lessons inner join group_content using (id_group) inner join all_users ON id_teacher = all_users.id_user ".
		 "where group_content.id_user ={$_SESSION['id_user']} AND ".
		 "date_lesson between '$start_date2' and '$end_date2' ";
    }
    else
    {
    	$sql_calendar7 = "SELECT *, DAYOFWEEK(date_lesson) as dow, HOUR(date_lesson) as h FROM 
    	  all_lessons inner join all_users ON id_teacher = id_user ".
		 "where id_group = $id_group AND ".
		 "date_lesson between '$start_date2' and '$end_date2' ";

    }

    $result = mysqli_query($connect, $sql_calendar7);
    $lessons = array();
    while($row =  mysqli_fetch_assoc($result))
    {
    	$dow = $row['dow'];
    	$dow = $dow-1;
		if($dow == 0)
		{
		  $dow=6;
		}

    	$h = $row['h'];
    	if (!isset($lessons[$dow]))
    	{
    	$lessons[$dow] = array();
    	}
    	$lessons[$dow][$h] = $row;
    }
 
    ?>
    <script>
    $(function()
    {
  var form = $('.fill_form');
  var isDragging = false;
  var mouseOffset = { x: 0, y: 0 };

  form.mousedown(function(e)
  {
    isDragging = true;
    mouseOffset.x = e.pageX - form.offset().left;
    mouseOffset.y = e.pageY - form.offset().top;
  });

  form.mousemove(function(e)
  {
    if (isDragging)
    {
      form.offset(
        {
        left: e.pageX - mouseOffset.x,
        top: e.pageY - mouseOffset.y
      });
    }
  });

  form.mouseup(function()
  {
    isDragging = false;
  });
});

    </script>
    <?php 
    $dates = array(
       strtotime($start_date2),
       strtotime($start_date2.' +1 days'),
       strtotime($start_date2.' +2 days'),
       strtotime($start_date2.' +3 days'),
       strtotime($start_date2.' +4 days'),
       strtotime($start_date2.' +5 days'),
       strtotime($start_date2.' +6 days')
    );
    
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
     <th class='data'>".date('d.m.y', $dates[0])."</th>
     <th class='data'>".date('d.m.y', $dates[1])."</th>
     <th class='data'>".date('d.m.y', $dates[2])."</th>
     <th class='data'>".date('d.m.y', $dates[3])."</th>
     <th class='data'>".date('d.m.y', $dates[4])."</th>
     <th class='data'>".date('d.m.y', $dates[5])."</th>
     <th class='data'>".date('d.m.y', $dates[6])."</th>
     <th class='data'><a href='?month={$month}&year={$year}&start_date2=".date('Y-m-d', strtotime($start_date2.' +7 days'))."'><img src='../images/strelka1.png' width = 40px >
      </a></th>
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
    	$id_group = '';
    	$date_lesson = date('Y-m-d',$dates[$j-1])." $h:00:00";
    	$onclick ="";
    	if(isset($lessons[$j]) && isset($lessons[$j][$h]))
    	{
    	   $name = $lessons[$j][$h]['name_lesson'];
    	   if(isset($lessons[$j][$h]['username']))
    	   {
			   $teacher = $lessons[$j][$h]['username'];
		   }
		  
		   $id_lesson = $lessons[$j][$h]['id_lesson'];
    	   $text_lesson = $lessons[$j][$h]['text_lesson'];
    	   $link_lesson = $lessons[$j][$h]['link_lesson'];
    	   $id_group = $lessons[$j][$h]['id_group'];
    	   
    	   $sql = "SELECT name_group FROM all_groups inner join all_lessons using(id_group) WHERE id_lesson = '$id_lesson'";
		   $result = mysqli_query($connect, $sql);
		   $row = mysqli_fetch_array($result);
		   $name_group= $row['name_group']; 
		   
		   
    	   $onclick ="fill(`{$id_lesson}`, `{$name}`, `{$text_lesson}`, `{$link_lesson}`, 
    	 `{$date_lesson}`, `{$id_group}`)";
    	   $content = "
    	<div class='subject'>
       <div class='name'> $name </div>
       <div class='teacher'> $teacher </div>
       <div class='group_student'> <small>{$name_group}</small></div>
      </div>";
    	}
    	 echo "<td onclick='$onclick'>{$content}</td>";
    	}
    	echo "<td class='time'>$h:00</td>";
    	echo "</tr>";
    }
    echo "
    </table>";


    ?>
<div id='modal' style='display:none; position: relative;
    top: 50%;
    left: 50%;
    width: 200px;
    height:100px;
    border: 1px solid;
    background-color: white;'>
	<form class='fill_form' id='fill_form' action='create_lesson.php' method="POST">
	   <p style='font-size: 14px;'><b>Просмотр занятия</b></p>
	  <input type='hidden' id='id_lesson' name='id_lesson'>
	  <input type='hidden'  name='select_id_group' value='<?=(int)$_GET['select_id_group']?>'>
	  <input type='text' id='name_lesson' name='name_lesson' size="30" readonly>
      <select id='id_group' name='id_group'  >
		  <?php 
  		echo "<option value='0'>Не выбрано</option>";
  		$sql_group = 'SELECT * FROM all_groups where deleted_group = false AND id_group != 1';
  		$group_query = mysqli_query($connect, $sql_group);
  		while($row =  mysqli_fetch_assoc($group_query) )
  		{
  		 echo "<option value='{$row['id_group']}'>{$row['name_group']}</option>";
  		}?>
      </select>
	  <p style='font-size: 14px;'> <i>Текст занятия </i></p> <textarea id='text_lesson' name='text_lesson' readonly> </textarea>
	  <input type='text' id='link_lesson' name='link_lesson' readonly>
	  <input type='hidden' id='date_lesson' name='date_lesson'> 
	  <input type='button' value='Отменить' onclick='modal.style.display = `none` '>
	</form>
</div>

<script>
 function fill(vid_lesson, vname_lesson, vtext_lesson, vlink_lesson, vdate_lesson, vid_group)
 {
    name_lesson.value = vname_lesson;
    id_lesson.value = vid_lesson;
    text_lesson.value = vtext_lesson;
    link_lesson.value = vlink_lesson;
    date_lesson.value = vdate_lesson;
    id_group.value = vid_group; 
    modal.style.display = null;

 }

 
</script>

