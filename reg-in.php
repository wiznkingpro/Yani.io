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
	<title>Регистрация</title>
</head>
<body>
	<div class="reg_container">
		<center>
			<img src="uploads/system/logo.svg" style="width: 100px;">
			<h3 style="font-family: 'Dancing Script', cursive;color: white;font-size: 42px;">AtmoSphere</h3>
		</center>
		<br>
		<form action="reg.php" method="post">
			<center>
				<input type="text" name="nick" placeholder="Введите никнейм" required>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="one_password" placeholder="пароль" minlength="6" required>
				<input type="password" name="two_password" placeholder="повторите пароль" minlength="6" required><br>
				<button type="submit" name="submit_reg">Зарегистрироваться</button>
			</center>	
		</form>
		<br>
		<center><a href="log-in">Уже есть Аккаунт</a></center>
	</div>
</body>
</html>