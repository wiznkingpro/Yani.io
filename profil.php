<?php 
	require "includes/db_connect.php";
	session_start();

	if (isset($_SESSION['user']['user_id'])) {
		$my_id = $_SESSION['user']['user_id'];
		$user = mysqli_query($db, "SELECT * FROM users WHERE user_id = $my_id");
		$data = mysqli_fetch_assoc($user);
		$default_avatar_name = 'noavatars.jpg';
		$notification_text = 'Здравстуйте, пожалуйста смените Аватарку :)';
		$notification_avatar = 'uploads/avatars/noavatars.jpg';
		$notification_name = 'YaNi';
		$check_notification_query = mysqli_query($db, "SELECT * FROM notification WHERE notification_text = '{$notification_text}' AND notification_avatar = '{$notification_avatar}' AND notification_from_id = '{$my_id}'");
		 $existing_notification = mysqli_fetch_assoc($check_notification_query);
		 if ($data['avatar'] == $default_avatar_name) {
		 	if (!$existing_notification) {
				mysqli_query($db, "INSERT INTO `notification` (`notification_text`, `notification_from_id`, `notification_avatar`, `notification_name`) VALUES ('{$notification_text}', '{$my_id}', '{$notification_avatar}', '{$notification_name}') ");		
		 	}else{

		 	}
		}else{
			mysqli_query($db, "DELETE FROM `notification` WHERE `notification_from_id` = '{$my_id}' AND `notification_text` = '{$notification_text}' AND `notification_name` = '{$notification_name}' ");
			};	
	}else{
		header("Location:log-in");
	};
	

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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<script src="jquery-3.7.1.js"></script>
	
</head>
<body>
	<?php include "nav.php"; ?>	
	<div class="container">
	<div class="profil_fon">
		<div class="profil_fon_avatar">
			<?php 
				$my_id = $_SESSION['user']['user_id'];
				$users = mysqli_query($db, "SELECT * FROM `users` WHERE `user_id` = $my_id  ");
					while ($art = mysqli_fetch_assoc($users)) {
			 ?>
			<a href="options"><img src="uploads/avatars/<?php echo $art['avatar']; ?>"></a>
		
		</div>
	</div>

	<div class="profil_info_table">
		<center><h3><?php echo $art['nick']; ?></h3></center>
			<div class="profil_info_table_sabs">
					<a href="#"><h4>Подписок 0</h4></a>
					<p> · </p> 
					<a href="#"><h4>Фанов 0</h4></a>
			</div>
			<a href="level" style="text-decoration: none;">
				<center>
					<h4 style="color: white;padding-bottom: 5px;">Lvl·<?php echo $art['level']; ?></h4>
				</center>
			</a>
			<a href="level">
				<div class="xp_bar">
					<div class="xp_progress" style="width:<?php echo $art['level_progress']; ?>;"></div>
				</div>
			</a>
	</div>
	<center>
		
	</center>
	<?php }; ?>
		<?php 
			$posts = mysqli_query($db, "SELECT * FROM `posts` WHERE `creater_id` = $my_id ORDER BY `posts`.`post_id` DESC ");
				$num_articles = mysqli_num_rows($posts);	
				if ($num_articles == 0) {
					?>
					<center><a href="creater_post" style="padding:10px;text-decoration:none;background-color: #e5081b;border:none;width: 270px;height: 35px;border-radius: 15px;color: white;">Опубликуйте пост</a></center><br>
					<center><p2 style="color:#ccc;">Чем больше постов тем больше фанов!</p2></center>
				<?php }else{
						while ($art = mysqli_fetch_assoc($posts)) {
					?>	
					
					<div class="cont_post">
						<div class="cont_post_name">
							<center><h2><?php echo $art['name']; ?></h2></center>
						</div><hr>
						<center><img src="<?php echo $art['photo']; ?>" alt=""></center>
						<div class="cont_post_desc">
							<p><?php echo $art['decs']; ?></p>
							<center><p3 style="color: grey;"><?php echo $art['tags']; ?></p3></center>
						</div>

						<div class="cont_post_likes">
							<a href="#"><img src="uploads\system\heart.png"></a><p3>0</p3>
							<a href="#"><img src="uploads\system\comment.png"></a><p3>0</p3>	
							<img src="uploads\system\menu.svg" onclick="myFunction()" class="dropbtn">
						</div>
						
					</div><br>
					
				<?php };}; ?>
				<br><br><br>

				
				
				<script src="script.js"></script>
				<script>
					let prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    let currentScrollPos = window.pageYOffset;

    // Для элемента с id "navbar"
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("navbar").style.bottom = "0";
    } else {
      document.getElementById("navbar").style.bottom = "-65px";
    }

    // Для элемента с id "topbar"
    
    
    prevScrollpos = currentScrollPos;
  }
				</script>
</body>
</html>
