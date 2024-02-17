<?php

require "includes/db_connect.php";
session_start();

if (isset($_SESSION['user']['user_id'])) {
} else {
    header("Location: index.php");
    exit;
}

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $target_dir = "uploads/avatars/";
    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $random_name = uniqid() . '.' . $extension;
    $target_file = $target_dir . $random_name;
    $my_id = $_SESSION['user']['user_id'];

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $id = $_SESSION['user']['user_id'];
        $random_name = mysqli_real_escape_string($db, $random_name);
        mysqli_query($db, "UPDATE users SET avatar = '$random_name' WHERE user_id = $my_id");

        echo "<center><img src='$target_file' alt='Изображение'></center>";
        echo '<br><center><a href="profil" style="color:white;background-color: #e5081b;color:white;text-decoration: none;border-radius:20px;padding:5px;">Перейти в профиль</a>';
    } else {
        echo "Ошибка при загрузке изображения.";
    }
} else {
    echo "Ошибка при загрузке изображения.";
}
