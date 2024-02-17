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
	<title>Лента</title>
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<script src="script.js"></script>
	<script src="menu.js"></script>
	
</head>
<body>
	<?php include "top_bar.php"; ?>
	<?php include "nav.php"; ?>
	<div class="lenta_main_cont">
<!-- 		<div class="box_game_choice">
			<?php 
				$games = mysqli_query($db, "SELECT * FROM `games` ");
					while ($game = mysqli_fetch_assoc($games)) {
			 ?>
			 <div class="box_game_choice_scroll">
				<div class="box_game_choice_cont">				
					<h4 style="color: white;"><?php echo $game['game_name']; ?></h4>
				</div>
			</div>
		<?php }; ?>
		</div> -->
		
		<?php 
			$posts = mysqli_query($db, "SELECT * FROM `posts` ORDER BY `posts`.`post_id` DESC ");
				$num_articles = mysqli_num_rows($posts);	
				if ($num_articles == 0) {
					?><br>
					<center><a href="creater_post" style="padding:10px;text-decoration:none;background-color: #e5081b;border:none;width: 270px;height: 35px;border-radius: 15px;color: white;">Опубликуйте пост</a></center><br>
					
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

	</div>

</body>
</html>