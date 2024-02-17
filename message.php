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
	<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/main.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Мессенджер</title>
</head>

<body>
	<div class="main_cont">

			
		<div class="container">
			 <div class="message_top">
			 	<a href="notification"><img src="uploads/system/chevron_left_FILL0_wght400_GRAD0_opsz24.svg" width="50" style="margin-top: 16px;"></a>
			 	<?php 
			 	$id = $_GET['id'];
			 	$articles = mysqli_query($db, "SELECT * FROM users WHERE `user_id` = $id ");
			 		while ($art = mysqli_fetch_assoc($articles)) {
			 	 ?>
			 	<div class="message_top_avatar">
			 		<a href="human?id=<?php echo $id; ?>"><img src="uploads/avatars/<?php echo $art['avatar']; ?>" alt=""></a>
			 		<h3><?php echo $art['nick']; ?></h3>
			 	</div>
			 	
			 </div>
			<?php }; ?>

			<script type="text/javascript">
			function updateBlocks() {

				
	$(document).ready(function(){
		let id = <?php echo $id; ?>;			
		$.ajax({
			url:"ot_message.php?id=<?php echo $id; ?>",
			method:"POST",
			data: {id:id},
			success:function(data){
				$("#result").html(data);

			}
		});

	});
}
	setInterval(updateBlocks, 500);
  $(document).ready(function(){
    $('button.otpravka').on('click', function(){
      $.post(
        'add_message.php?id=<?= $id ?>',
        {content_mesage_input: $('input.content_mesage_input').val()},
        function () {
          $.post(
            'ot_message.php',
            {id: <?= $id ?>},
            function(data) { $("#result").html(data); },
            'html'
          );

          $('input.content_mesage_input').val('');
        }
      );
    });
  });
  
    
</script>	

			<div class="message_chat_cont" id="element">
					<div class="content-message-pole" id="result">

			</div>
								
				
					
			</div>	
			
			<div class="message_but_bottom">
				<div class="message_but_bottom_add_file">
				<form action="" >
					<form id="image-upload-form" action="upload.php" method="post" enctype="multipart/form-data">
  <label class="input-file" id="hid">
    <input type="file" name="images[]" accept="image/*" multiple required>
    <img src="uploads/system/free-icon-attach-file-5909248.png" width="50">
  </label>


				</div>

					<input type="text" name="content_mesage_input" id="input" oninput="changeStyle()" class="content_mesage_input">
					<button id="something" name="submit-content-message" class="otpravka">.</button>
					 
				</form>	
					<script type="text/javascript">
						function changeStyle() {
  let inputValue = document.getElementById("input").value;
  let box = document.getElementById("something");
  let hid = document.getElementById("hid");
  let inp = document.getElementById("input");
  if (inputValue.replace(/\s/g, "") !== "") {
  	box.style.display = "inline-block";
    box.style.backgroundColor = "#e5081b";
    box.style.transform = "rotate(5deg)";

  } else {

    box.style.backgroundColor = "#151719e8";
    box.style.transform = "rotate(-180deg)";
    // box.style.display = "none";
  }
  document.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                   // box.style.display = "none";
    								box.style.backgroundColor = "#151719e8";
    								box.style.transform = "rotate(-180deg)";
                }
            });
}


					</script>
				</form>
			</div>
		</div>
	</div>

	<script src="message_scroll_botton.js"></script>
</body>
</html>