<?php 
	require "includes/db_connect.php";
	session_start();
	if (!isset($_SESSION['user']['user_id'])) {
		echo '<a href="reg-in">db false, go session link</a>';
	}else{
		
	}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/main.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Публикация</title>
	<script>
$(document).ready(function(){
    $("#uploadForm").on("submit", function(e){
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "upload_post.php",
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
</head>

<body>
	<script>
    				$('.input-file input[type=file]').on('change', function(){
						let file = this.files[0];
						$(this).next().html(file.name);
					});
					$(document).ready(function(){
    $('a').click(function(){
        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
        return false;
    });
});
    			</script>
	<div class="main_cont">
		<?php include "nav.php"; ?>
	<div class="container">
		<center><p style="padding: 5px;background-color: white;color: black;border-radius:20px">опубликуйте запись</p></center>
		<div class="creater_photo">
			
			<form id="uploadForm" class="uploadForm_form">
					<center>
					<label class="input-file">
	   				<input type="file" name="image" accept="image/*" >		
	   				<span>Фото</span>
 					</label>
        			<br>
        			<input type="text" name="title" placeholder="Название поста" maxlength="30" required ><br>
       				<textarea name="description" placeholder="Описание" required ></textarea><br>
       				<input name="post_game" placeholder="Название игры" required ><br>
       				<textarea name="tags" placeholder="#Тэги, максимум 30 букв" maxlength="30" ></textarea><br>
        			<button type="submit">Опубликовать</button></center>
    			</form>
    			<div id="result"></div>
    	</div>	
	</div>
	</div>

</body>
</html>
