<?php
session_start();
require('connect.php');


$id_lesson = (int) $_POST['id_lesson'];
$name_lesson = $_POST['name_lesson'];
$text_lesson = $_POST['text_lesson'];
$link_lesson = $_POST['link_lesson'];
$date_lesson = $_POST['date_lesson'];
$id_group = $_POST['id_group'];
$id = $_SESSION['id_user'];

	$sql = "SELECT * FROM `all_lessons` WHERE `id_group`='$id_group' and `date_lesson`='$date_lesson' and `id_lesson` <> {$id_lesson}";
	$result = mysqli_query($connect, $sql);

		if ($id_lesson > 0)
		{
			$sql = "UPDATE `all_lessons` SET `name_lesson`='$name_lesson',
			`id_teacher`='$id',`id_group`='$id_group',`date_lesson`='$date_lesson',`text_lesson`='$text_lesson',
			`link_lesson`='$link_lesson' WHERE `id_lesson`='$id_lesson'";
			mysqli_query($connect, $sql);
		}

		else
		{
		$sql = "INSERT INTO all_lessons(id_lesson, name_lesson, id_teacher, id_group, date_lesson, text_lesson, link_lesson)
		VALUES (NULL, '$name_lesson' ,'$id','$id_group','$date_lesson','$text_lesson','$link_lesson')";
		mysqli_query($connect, $sql);
		}

  $select_id_group = (int)$_POST['select_id_group'];
  header('Location: account.php?select_id_group='.$select_id_group);

 ?>
