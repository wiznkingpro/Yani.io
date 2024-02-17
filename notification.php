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
	<center><h3>Уведомления <?php echo $totalRecords; ?></h3></center><br>
	<center><input id="click-to-hide" type="button" value="показать" style="border: none;width: 80%;height: 30px;background-color: #e5081b;border-radius: 10px;color: white;"></center>
	<div class="container" id="hidden-element">
		<br>
		
		<?php 
			$my_id = $_SESSION['user']['user_id'];
       		$sql = "SELECT COUNT(*) as total_records FROM notification WHERE notification_from_id = $my_id";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $totalRecords = $row['total_records'];
            $user = mysqli_query($db, "SELECT * FROM notification WHERE notification_from_id = $my_id ORDER BY `notification`.`notification_id` DESC ");
			while ($art = mysqli_fetch_assoc($user)) {?>
		<div class="notification_cont">
			<div class="notification_cont_avatar">
				<center><img src="<?php echo $art['notification_avatar']; ?>" alt=""></center>
				<div class="notification_cont_name">
					<h3><?php echo $art['notification_name']; ?></h3>
				</div>
			</div>
			
			<div class="notification_cont_content">
				<p><?php echo $art['notification_text']; ?></p>
			</div>
		</div>
	<?php }; ?>
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
  	<br>
  	<center><h3>Мессенджер</h3></center><br>
  	<?php 
        $query = "SELECT * FROM message WHERE message_from_id = $my_id OR message_creater_id = $my_id ";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 0) {
            echo '<br><center><h4 style="color:gray;">Тут ничего нет :(</h4></center>';
        } else {
            $userIds = [];
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['message_from_id'] !== $my_id) {
                    $userIds[] = $row['message_from_id'];
                }
                if ($row['message_creater_id'] !== $my_id) {
                    $userIds[] = $row['message_creater_id'];
                }
            }

            $userIds = array_unique($userIds);
            $userIdsString = implode(',', $userIds);

            $usersQuery = "SELECT * FROM users WHERE user_id IN ($userIdsString)";
            $usersResult = mysqli_query($db, $usersQuery);

            while ($user = mysqli_fetch_assoc($usersResult)) { 
?>
       	<a href="message?id=<?php echo $user['user_id']; ?>" style="text-decoration: none;">
            <div class="message_box_cont">
                <div class="message_box_cont_avatar">
                    <img src="uploads/avatars/<?php echo $user['avatar']; ?>">
                </div>
                    <h3><?php echo $user['nick']; ?></h3>
                    <p3 style="color: grey;">#<?php echo $user['user_id']; ?></p3>
            </div>
        </a>
<?php 
            }
        }
?>
			

  	
</body>
</html>