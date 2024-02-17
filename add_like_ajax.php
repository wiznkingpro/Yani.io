<?php
require "includes/db_connect.php";
session_start();

if (!isset($_SESSION['user']['user_id'])) {
    header("Location: index.php");
    exit();
}

$my_id = $_SESSION['user']['user_id'];
$li_id = $_POST['photo_id'];
$name = $_SESSION['user']['nick'];

mysqli_query($db, "INSERT INTO likes (creater_like_id, photo_id, creater_like_name) VALUES ('$my_id', '$li_id', '$name')");

$sql = "SELECT COUNT(*) as total_records FROM likes WHERE photo_id = $li_id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result); 
$totalRecords = $row['total_records'];

$response = [
    'totalRecords' => $totalRecords,
    'icon' => '<img src="uploads/system/heart_red.png">'
];

// Возвращаем данные в формате JSON
header('Content-Type: application/json');
echo json_encode($response);
?>	