<?php

require "includes/db_connect.php"; 
session_start();
if (isset($_SESSION['user']['user_id'])) {
  } else {
    header("Location: index.php");
};

$title = isset($_POST["title"]) ? $_POST["title"] : '';
$description = isset($_POST["description"]) ? $_POST["description"] : '';
$tags = isset($_POST['tags']) ? $_POST['tags'] : '';
$name_game = isset($_POST['post_game']) ? $_POST['post_game'] : '';

$target_file = "";
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $target_dir = "public/photos/";
    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $random_name = uniqid() . '.' . $extension;
    $target_file = $target_dir . $random_name;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Фотография успешно загружена
    } else {
        echo "Ошибка при загрузке изображения.";
        $target_file = ""; // сбросить значение, если произошла ошибка загрузки
    }
}

$id = $_SESSION['user']['user_id'];
$today = date('Y-m-d H:i:s');

mysqli_query($db, "INSERT INTO posts (creater_id, decs, photo, tags, name, post_game) 
                VALUES ('{$id}', '{$description}', '{$target_file}', '{$tags}', '{$title}', '{$name_game}' )");

echo '<br><center><a href="profil" style="background-color: #e5081b;color:white;text-decoration: none;padding: 10px;text-align: center;border-radius: 15px;width: 300px;height: 30px;">Посмотреть в профиле</a></center>';
if (!empty($target_file)) {
    echo "<br><br><center><img src='".$target_file."' alt='Изображение' ></center>";
}
?>