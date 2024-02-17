<?php
require "includes/db_connect.php";
session_start();

if (!isset($_SESSION['user']['user_id'])) {
    header("Location: index.php");
    exit();
}
$my_id = $_SESSION['user']['user_id'];
$li_id = $art['id'];

$check_subscription = mysqli_query($db, "SELECT * FROM likes WHERE creater_likes_id = $my_id AND post_id = $li_id");

if (mysqli_num_rows($check_subscription) == 0) {
    echo '<a style="cursor:default;" title="Чпоньк" data-photo-id="' . $li_id . '"><img src="uploads/system/heart.png"></a>';
} else {
    echo '<a style="cursor:default;" title="Не чпонькать" ><img src="uploads/system/heart_red.png"></a>';
}

$sql = "SELECT COUNT(*) as total_records FROM likes WHERE photo_id = $li_id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result); 
$totalRecords = $row['total_records'];


?>
