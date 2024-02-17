<?php 
	require "includes/db_connect.php";
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Whisper&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/reg.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blesscon</title>
</head>
<body>
	<div class="reg_container">
		<center>
			<img src="uploads/system/logo.svg" style="width: 100px;">
			<h3 style="font-family: 'Dancing Script', cursive;color: white;font-size: 42px;">YaNi</h3>
		</center>
		<br>
		<form action="aut.php" method="post">
			<center>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="password" placeholder="пароль" minlength="6" required><br>
				<button type="submit">Войти</button>
			</center>	
		</form>
		<br>
		<center><a href="reg-in">Ещё нету аккаунта</a></center>
	</div>
</body>
</html>