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
	<div class="profil_fon">
		<div class="profil_fon_avatar">
			<?php 
				$u_id = $_GET['id'];
				$users = mysqli_query($db, "SELECT * FROM `users` WHERE `user_id` = $u_id");
					while ($art = mysqli_fetch_assoc($users)) {
			 ?>
			<a href="message?id=<?php echo $u_id; ?>"><img src="uploads/avatars/<?php echo $art['avatar']; ?>"></a>
		
		</div>
	</div>

	<div class="profil_info_table">
		<center><h3><?php echo $art['nick']; ?></h3></center>
			<div class="profil_info_table_sabs">
					<a href="#"><h4>Подписок 0</h4></a>
					<p> · </p> 
					<a href="#"><h4>Фанов 0</h4></a>
			</div>	
	</div>
		<?php }; ?>

	<?php 
			$id = $_GET['id'];
			$posts = mysqli_query($db, "SELECT * FROM `posts` WHERE `creater_id` = $id ORDER BY `posts`.`post_id` DESC ");
				$num_articles = mysqli_num_rows($posts);	
				if ($num_articles == 0) {
					?>
					<center><p style="color: #ccc;">У пользователя ещё нету публикаций :(</p></center>
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
						</div>

						<div class="cont_post_likes">
							<a href="#"><img src="uploads\system\heart.png"></a><p3>0</p3>
							<a href="#"><img src="uploads\system\comment.png"></a><p3>0</p3>	
							<img src="uploads\system\menu.svg" onclick="myFunction()" class="dropbtn">
						</div>
						
					</div><br>
					
				<?php };}; ?>
</body>
</html>