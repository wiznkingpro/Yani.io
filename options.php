<?php 
	require "includes/db_connect.php"; 
	session_start();
	if (isset($_SESSION['user']['user_id'])) {
  }else{
  	header("Location: log-in");
 };
 	$my_id = $_SESSION['user']['user_id'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/main.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Настройки профиля</title>
	<script src="noscroll.js"></script>
</head>
<script>
$(document).ready(function(){
    $("#uploadForm").on("submit", function(e){
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "upload_avatar.php?id=<?php echo $my_id; ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                // Обработка успешной загрузки
                $("#result").html(data);
            }
        });
    });
});
</script>
	<body>
		<div class="main_cont">
		<?php require "nav.php"; ?>
		<div class="container">
			<div class="options_avatar">
			<center><p style="padding: 5px;background-color: white;color: black;">Настройки</p></center><br>
			<center><p style="padding: 5px;background-color: grey;color: black;width: 50%;border-radius: 20px;"></p></center>
				<div class="avatar_block_table_options">				
					<div id="result">
						<?php $articles = mysqli_query($db, "SELECT * FROM `users` WHERE `user_id` = $my_id ");
			while ($art = mysqli_fetch_assoc($articles)){ ?>
						<img src="uploads/avatars/<?php echo $art['avatar']; ?>" alt="">
					
					</div>
				</div>
					<div class="options_avatar_info"><br><br>
					 <center>	
						<form id="uploadForm">						
								<label class="input-file">
	   							<input type="file" name="image" accept="image/*" required>		
	   							<span>Добавьте фото</span>
 								</label><br>
        						<button type="submit">Обновить</button>
    					</form>
    			<script>
    				$('.input-file input[type=file]').on('change', function(){
						let file = this.files[0];
						$(this).next().html(file.name);
					});
    			</script>
    			</center>
				</div>
				<center><p style="padding: 5px;background-color: grey;color: black;width: 50%;border-radius: 20px;"></p></center>
				<form action="">
					<center>
						<input type="text" value="<?php echo $art['nick']; ?>">
						<button>Переиминовать</button>
					</center>
				</form>
			</div>			
		</div>
	</div>
	<?php }; ?>
</body>
</html>