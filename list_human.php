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
	<div class="container">

		<?php 
		$my_id = $_SESSION['user']['user_id'];
		$sql = "SELECT COUNT(*) as total_records FROM users WHERE `user_id` != $my_id";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result); 
		$totalRecords = $row['total_records'];

		$sql = "SELECT COUNT(*) as total_records FROM friend WHERE `subs_from_id` = $my_id";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result); 
		$totalRecords_subs = $row['total_records'];
		 ?>
	<center><h3>Пользователи <?php echo $totalRecords; ?></h3></center><br>
	<center><input id="click-to-hide" type="button" value="показать" style="border: none;width: 80%;height: 30px;background-color: #e5081b;border-radius: 10px;color: white;"></center>
	<br>
	<div class="cotainer" id="hidden-element">	
	<?php 		
				$u_id = $_GET['id'];
				$users = mysqli_query($db, "SELECT * FROM `users` WHERE `user_id` != {$my_id} ");
					while ($art = mysqli_fetch_assoc($users)) {
			 ?>
	<div class="list_human_cont" >
		<div class="list_human_cont_avatar">
			<a href="human?id=<?php echo $art['user_id']; ?>"><img src="uploads/avatars/<?php echo $art['avatar']; ?>" alt=""></a>
		</div>

		<div class="list_human_cont_names">
			<div class="list_human_cont_names_nick">
				<h3><?php echo $art['nick']; ?></h3>
				<a href="message?id=<?php echo $art['user_id']; ?>"><button>Написать</button></a>
				<a href="#"><button>Подписаться</button></a>
			</div>
		</div>
			
	</div>

	
			
	
	<?php }; ?>
	</div>
	<div class="container">
	<center><h3>Фаны <?php echo $totalRecords_subs; ?></h3></center>
	<?php 	
				$users = mysqli_query($db, "SELECT * FROM `friend` WHERE `subs_from_id` = {$my_id} ");
					while ($art = mysqli_fetch_assoc($users)) {
						$subs = $art['subs_id'];
						$subs = mysqli_query($db, "SELECT * FROM `users` WHERE `user_id` = {$subs} ");
							while ($art1 = mysqli_fetch_assoc($subs)) {
			 ?>
	
	<div class="list_human_cont">
		<div class="list_human_cont_avatar">
			<a href="human?id=<?php echo $art1['user_id']; ?>"><img src="uploads/avatars/<?php echo $art1['avatar']; ?>" alt=""></a>
		</div>

		<div class="list_human_cont_names">
			<div class="list_human_cont_names_nick">
				<h3><?php echo $art1['nick']; ?></h3>
				<a href="message?id=<?php echo $art1['user_id']; ?>"><button>Написать</button></a>
				<a href="#"><button>Подписаться</button></a>
			</div>
		</div>
	</div>
<?php }; };?>
	</div>
	</div>
	<script>
  document.addEventListener("DOMContentLoaded", hiddenCloseclick());
  document.getElementById('click-to-hide').addEventListener("click", hiddenCloseclick);
 function hiddenCloseclick() {
 let x = document.getElementById('hidden-element');
      if (x.style.display == "none"){
   x.style.display = "block";
   } else {
 x.style.display = "none"}
    };
 
  </script>

</body>
</html>