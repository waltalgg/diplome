<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/admin_panel.css">
    <title>Admin Panel</title>
  </head>
  <body>
      <a href='user_profile.php' style = 'color: white; float: right; font-size: 22px; width: 5%; font-family: sans-serif;'> Выйти </a>
      <a href='index.php' style = 'color: white; float: right; font-size: 22px; width: 10%; font-family: sans-serif;'> На главную </a>
    <table>
  <thead>
    <tr>
      <th>id_group</th>
      <th>id_user</th>
    </tr>
  </thead>
  <tbody>
    <?php
      session_start();
      require('connect.php');
      $sql =  "SELECT * FROM group_content";
      $result = mysqli_query($connect, $sql);
      while ($row = mysqli_fetch_array($result))
      {
  			?>
  			<tr>
  				<td><?=$row['id_group'];?></td>
          			<td><?=$row['id_user'];?></td>
  			</tr>
    <?php }?>
  </tbody>
</table>
  </body>
</html>
