<?php session_start();
require('connect.php');
$id_group='';
$id_lesson = (int)$_GET['id_lesson'];
$date_lesson = $_GET['date_lesson'];
$name_lesson ='';
$text_lesson='';
$link_lesson = '';
if($id_lesson>0)
{
	$sql = "SELECT * FROM all_lessons WHERE id_lesson='$id_lesson'";
	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($result);
	$name_lesson = $row['name_lesson'];
	$text_lesson = $row['text_lesson'];
	$link_lesson = $row['link_lesson'];
	$id_group = $row['id_group'];
	
}

?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title></title>
  <link rel="stylesheet" href="../css/calendar_7day.css">
  
   
   <style>
	 body{background: url('../images/back_lpanel.jpg');}
	 
   </style>
 </head>
 <body>
	 <div class='form_more'>
	<form class='fill_form' id='fill_form' action='create_lesson.php' method="POST">
	   <p style='text-align: center;'><b>Редактор занятий</b></p>
	  <input type='hidden' id='id_lesson' name='id_lesson' value='<?= $_GET['id_lesson'];?>'>
	  <input type='hidden'  name='select_id_group' value='<?=(int)$_GET['select_id_group']?>'>
	 <p> Название занятия: </p><textarea id='name_lesson' name='name_lesson'
	 style="width:400px; height:20px;"><?=$name_lesson?></textarea>
	  
	  <p> Выберите группу: </p>
      <select id='id_group' name='id_group' >
		  <?php 
  		echo "<option value='0'>Не выбрано</option >";
  		$sql_group = 'SELECT * FROM all_groups where deleted_group = false AND id_group != 1';
  		$group_query = mysqli_query($connect, $sql_group);
  		while($row =  mysqli_fetch_assoc($group_query) )
  		{
  		$selected = '';
  		if ($id_group == $row['id_group']) $selected = 'selected';
  		 echo "<option value='{$row['id_group']}' $selected>{$row['name_group']}</option>";
  		}?>
      </select>
	  <p><i>Текст занятия: </i></p> <textarea id='text_lesson' name='text_lesson' 
	  style="width:600px; height:100px;"><?=$text_lesson?></textarea><br><br>
		<p> Cсылка на занятие: </p> 
	  <textarea id='link_lesson' name='link_lesson' style="width:400px; height:20px;"><?=$link_lesson?></textarea> <br><br><br>
	  <input type='hidden' id='date_lesson' name='date_lesson' value='<?= $_GET['date_lesson'];?>'> 
	  <input type='submit' value='Сохранить' style='background: green;' onclick='onChange(event)'>
	  <a href='account.php?select_id_group=<?=$_GET['select_id_group']?>'><input type='button' style='background: orange;'value='Назад' onclick=''></a>
	  <input type='button' style='background: red;'value='Удалить' id = 'delete_lesson' onclick='fdelete_lesson()'>
	</form>
	</div>
	
	<script>
	 function onChange(e)
 {
	  e.preventDefault();
	  
	  if(id_group.value == 0)
	  {
		  alert('Группа не выбрана!');
		  return;
	  }
	  var data = new FormData()

	  data.append('id_lesson', id_lesson.value)
	  data.append('id_group', id_group.value)
	  data.append('date_lesson', date_lesson.value)
	  
	  var XHR = new XMLHttpRequest();
	  XHR.open("POST", "check_lesson.php");
	  XHR.send(data);
	  XHR.onload  = function() 
	  {
		   var jsonResponse = XHR.response;
		   console.log(jsonResponse);
		   if(jsonResponse == 'FREE') 
		   {
			    fill_form.submit();
		   }
		   else
		   {
			   alert('Время занято!!!');
		   }
	  };
 }
 
  function fdelete_lesson()
 {
		window.location = 'account.php?id_lesson='+id_lesson.value+'&delete_lesson=1';
 }
 
 
	</script>
 </body>
</html>
