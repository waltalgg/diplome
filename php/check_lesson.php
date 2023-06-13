<?php
session_start();
require('connect.php');

$date_lesson = $_POST['date_lesson'];
$id_group = $_POST['id_group']; 
$id_lesson = (int)$_POST['id_lesson']; 

$sql = "SELECT * FROM `all_lessons` WHERE `id_group`='$id_group' and `date_lesson`='$date_lesson' and `id_lesson` <> {$id_lesson}";
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result) == 0)
{
   echo "FREE";
}
else
{
   echo "BUSY";
}
 ?>
