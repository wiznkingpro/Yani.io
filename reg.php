<?php 
	require "includes/db_connect.php";

	if (isset($_POST['submit_reg'])) {
		$nick = trim($_POST['nick']);
		$email = trim($_POST['email']);
		$one_password = trim($_POST['one_password']);
		$two_password = trim($_POST['two_password']);
		

		$query = mysqli_query($db, "SELECT * FROM users WHERE email='{$email}'");
				if (mysqli_num_rows($query) == 0) {

			if ($one_password == $two_password) {
					$md5pass = md5($one_password);
					mysqli_query($db, "INSERT INTO `users` (`nick`, `email`, `password`) VALUES ('{$nick}', '{$email}', '{$md5pass}')");
					header("Location:log-in");
				}else{
					header("Location:reg-in");
				}		
			
				
		}else{

			$delay = 3;
			$url = "reg-in";
			echo '<p>Hel: '.$nick.'</p>';
			echo '<center><h1>Email '.$email.' уже занят</h1></center>';
			header("Refresh: $delay; URL=$url");
		}
		
	};
?>