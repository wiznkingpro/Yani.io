<?php
    require "includes/db_connect.php";
     if (isset($_POST['id'])){
            $id = $_POST['id'];
        }
    $my_id = $_SESSION['user']['user_id'];   
    
$all_messages = mysqli_query($db, "SELECT * FROM `message` WHERE (`message_from_id` = $my_id AND `message_creater_id` = $id) OR (`message_creater_id` = $my_id AND `message_from_id` = $id) ");  
$all_photo_message = mysqli_query($db, "SELECT * FROM `photo_message` WHERE (`message_from_id` = $my_id AND `message_creater_id` = $id) OR (`message_creater_id` = $my_id AND `message_from_id` = $id) ");         
while ($message = mysqli_fetch_assoc($all_messages) ){ 
    if ($message['message_from_id'] != $my_id) { 
        if($message['message_photo_check_box'] == 0){
            // Это сообщение от меня 
            echo '<div class="message-content-from" id="elementId_' . $message['id'] . '" oncontextmenu="showMenu(this)">';
            echo '<p>' . $message['message_content'] . '</p>';
            echo '</div>';
        }elseif ($message['message_photo_check_box'] == 1) {
            echo '<div class="message-content-from" id="elementId"><img src="public/photo_message/'. $message['message_content'] .'"></div>';
        }else{
            echo 'Ошибка';
        };
     

    } else { 
        if($message['message_photo_check_box'] == 0){
            // Это сообщение от другого пользователя 
            echo '<div class="message-content-u" id="elementId_' . $message['id'] . '" oncontextmenu="showMenu(this)">';
            echo '<p>' . $message['message_content'] . '</p>';
            echo '</div>';
        }elseif ($message['message_photo_check_box'] == 1) {
            echo '<div class="message-content-u" id="elementId"><img src="public/photo_message/'. $message['message_content'] .'"></div>';
        }else{
            echo 'Ошибка';
        };

    } 
}
// while ($photo_message = mysqli_fetch_assoc($all_photo_message) ){ 
//     if ($photo_message['message_from_id'] != $my_id) { 
        
//         // Это сообщение от меня 
//         

//     } else { 
//         // Это сообщение от другого пользователя 
//         echo '<div class="message-content-u" id="elementId"><img src="'. $photo_message['photo_dir'] .'"></div>'; 

//     } 
// }
 
?>
<script src="message.js"></script>
