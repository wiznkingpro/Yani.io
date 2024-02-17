<?php 
	require "includes/db_connect.php";
	session_start();
 ?>

<link rel="stylesheet" href="assets/css/nav.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<?php 
  if (isset($_SESSION['user']['user_id'])) {
 ?>
<div class="header" id="navbar">
    <a href="index" class="nav-link" data-href="index"><img src="uploads/system/home.svg"></a>
    <a href="list_human" class="nav-link" data-href="list_human"><img src="uploads/system/people.svg"></a>
    <a href="creater_post" class="nav-link" data-href="creater_post"><img src="uploads/system/wallpaper.svg"></a>
    <?php 
        $my_id = $_SESSION['user']['user_id'];
        $notification = mysqli_query($db, "SELECT * FROM notification WHERE notification_from_id = $my_id");
        if (mysqli_num_rows($notification) == 0) {
            echo '<a href="notification" class="nav-link" data-href="notification"><img src="uploads/system/chat.svg"></a>';
        }else{
           $sql = "SELECT COUNT(*) as total_records FROM notification WHERE notification_from_id = $my_id";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result); 
            $totalRecords = $row['total_records'];
            echo '<a href="notification" class="nav-link-a" data-href="notification"><img src="uploads/system/chat.svg"><p class="nav-link-p">' . $totalRecords . '</p></a>';
           
        } 
     ?>

    <?php 
      $my_id = $_SESSION['user']['user_id'];
      $users = mysqli_query($db, "SELECT * FROM users WHERE user_id = $my_id");
      while ($art = mysqli_fetch_assoc($users)) {
    ?>
    <a href="profil" class="nav-link" data-href="profil"><img src="uploads/avatars/<?php echo $art['avatar']; ?>" class="header_avatar"></a>
    <?php }; ?>
  </div>
<?php }else{?>
<div class="header" id="navbar">
    <a href="index" class="nav-link" data-href="index"><img src="uploads/system/home.svg"></a>
    <a href="log-in" class="nav-link" data-href="log-in"><img src="uploads/system/people.svg"></a>
    <a href="log-in" class="nav-link" data-href="log-in"><img src="uploads/system/wallpaper.svg"></a>
    <a href="log-in" class="nav-link" data-href="log-in"><img src="uploads/system/chat.svg"></a>
    <a href="log-in" class="nav-link" data-href="log-in"><img src="uploads/system/logo.svg"></a>
</div>

<?php }; ?>

 