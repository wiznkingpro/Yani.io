<?php
require "includes/db_connect.php";
session_start();

if (isset($_SESSION['user']['user_id'])) {
} else {
    header("Location: index.php");
}

$my_id = $_SESSION['user']['user_id'];
$li_id = $_POST['photo_id'];
$name = $_SESSION['user']['nick'];
$articles2 = mysqli_query($db, "SELECT * FROM `photos` WHERE id = $li_id ");
            while ($art2 = mysqli_fetch_assoc($articles2)) {
                $time = $art2['data'];
            }
mysqli_query($db, "INSERT INTO likes (creater_like_id, photo_id, creater_like_name) VALUES ('$my_id', '$li_id', '$name')");
	$sql = "SELECT COUNT(*) as total_records FROM likes WHERE photo_id = $li_id ";
	
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result); 
	$totalRecords = $row['total_records'];
	$sql = "SELECT COUNT(*) as total_records FROM comments WHERE from_photo_id = $li_id";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result); 
	$totaltime = $row['total_records'];
		echo '<a><img src="uploads/system/heart_red.png"></a>';
		echo '<p>'. $totalRecords . '</p>';
		echo '<img style="cursor:default;margin-left:25px;" src="uploads/system/comment.png"><p>' . $totaltime . '</p>';
		// echo '<h4 ">'.$time.'</h4>';
		

?>