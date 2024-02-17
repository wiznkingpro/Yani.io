<?php
require "includes/db_connect.php";
session_start();

if (!isset($_SESSION['user']['user_id'])) {
    header("Location: index.php");
    exit();
}

$my_id = $_SESSION['user']['user_id'];
$li_id = $art['id'];

$check_subscription = mysqli_query($db, "SELECT * FROM likes WHERE creater_like_id = $my_id AND photo_id = $li_id");

if (mysqli_num_rows($check_subscription) == 0) {
    echo '<a class="like-btn" title="Чпоньк" data-photo-id="' . $li_id . '"><img src="uploads/system/heart.png"></a>';
} else {
    echo '<a title="Не чпонькать" ><img src="uploads/system/heart_red.png"></a>';
}
$articles2 = mysqli_query($db, "SELECT * FROM `posts` WHERE id = $li_id ");
            while ($art2 = mysqli_fetch_assoc($articles2)) {
                $time = $art2['data'];
            }
$sql = "SELECT COUNT(*) as total_records FROM likes WHERE photo_id = $li_id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result); 
$totalRecords = $row['total_records'];

$sql = "SELECT COUNT(*) as total_records FROM comments WHERE from_photo_id = $li_id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result); 
$totaltime = $row['total_records'];
if ($li_id = $my_id) {
    echo '<p>' . $totalRecords . '</p>';
    echo '<img style="margin-left:25px;" src="uploads/system/comment.png"><p>' . $totaltime . '</p>';
    // echo '<h4 style="margin-right:10px;">'.$time.'</h4>';
}
?>
