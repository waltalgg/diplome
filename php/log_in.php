<?php

seccion_start();
include('db.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Соединение разорвано " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Получение данных из формы
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM all_users WHERE email='$email' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
    header("Location: user_profile.php");
  }
  else
  {
    $error = "Неверное имя пользователя или пароль";
  }
}

// Закрытие соединения с базой данных
$conn->close();
?>
