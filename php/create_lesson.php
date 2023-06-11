<?php
session_start();
require('connect.php');


$name_lesson = $_POST['name_lesson'];
$text_lesson = $_POST['text_lesson'];
$link_lesson = $_POST['link_lesson'];
$id = $_SESSION['id_user'];
$sql = "INSERT INTO all_lessons(id_lesson, name_lesson, id_teacher, id_group, date_lesson, text_lesson, link_lesson)
VALUES (NULL, '$name_lesson' ,'$id','2','2023-06-13 16:00:00','$text_lesson','$link_lesson')";

mysqli_query($connect, $sql);
header('location: account.php');
 ?>
