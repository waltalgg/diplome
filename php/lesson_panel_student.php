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
	  <p><i>Текст занятия: </i></p> <textarea id='text_lesson' name='text_lesson'
	  style="width:600px; height:100px;" readonly><?=$text_lesson?></textarea><br><br>
		<p> Cсылка на занятие: </p>
	  <textarea id='link_lesson' name='link_lesson' style="width:400px; height:20px;" readonly><?=$link_lesson?></textarea> <br><br><br>
	  <input type='hidden' id='date_lesson' name='date_lesson' value='<?= $_GET['date_lesson'];?>'>
	  <a href='account.php?select_id_group=<?=$_GET['select_id_group']?>'><input type='button' style='background: orange;'value='Назад' onclick=''></a>

	</form>
	</div>
	
 </body>
</html>
