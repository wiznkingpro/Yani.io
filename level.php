<?php 
	require "includes/db_connect.php";
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Профиль</title>
	<link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
	<?php include "nav.php"; ?>
	<br>
	<?php 
		$users = mysqli_query($db, "SELECT * FROM `users` WHERE `user_id` = $my_id  ");
		$art = mysqli_fetch_assoc($users);
	 ?>
	<center><h3>Уровень <?php echo $art['level_progress']; ?></h3></center><br>
	
  	
</body>
</html>