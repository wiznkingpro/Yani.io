<?php
    require "includes/db_connect.php";
    $id = $_GET['id'];
    $my_id = $_SESSION['user']['user_id'];   

// Обработка загруженного файла
if (isset($_FILES['photo'])) {
  // Получаем информацию о загруженном файле
  $photo = $_FILES['photo'];
}else{

};

  $filename = uniqid() . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
  move_uploaded_file($photo['tmp_name'], 'public/photo_message/' . $filename);

  mysqli_query($db, "INSERT INTO `message` (`message_creater_id`, `message_from_id`, `message_content`) VALUES ('{$my_id}', '{$id}', '{$filename}' )");