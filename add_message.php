<?php
require "includes/db_connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$u_id = $_SESSION['user']['user_id'];
$form_content_message = $_POST['content_mesage_input'];
$form_content_message = htmlspecialchars($form_content_message, ENT_QUOTES, 'UTF-8');
$today = date("H:i");
// Проверка на пустое сообщение
if (!empty($form_content_message)) {
    $cont = mysqli_query($db, "INSERT INTO `message` (`message_creater_id`, `message_from_id`, `message_content`) VALUES ('{$u_id}', '{$id}', '{$form_content_message}' )");

    if ($cont) {
        // Сообщение успешно добавлено в базу данных
        echo "Сообщение успешно отправлено.";
    } else {
        // Ошибка при добавлении сообщения в базу данных
        echo "Произошла ошибка при отправке сообщения.";
    }
} else {
    // Пустое сообщение, не отправляем
    echo "Сообщение не может быть пустым.";
}

?>