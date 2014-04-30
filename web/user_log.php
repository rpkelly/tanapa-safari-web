<?php

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_log_data = json_decode(file_get_contents("php://input"));
    $stmt = $db_conn->prepare("INSERT INTO USER_LOG (time, latitude, longitude, user_id) VALUES(?, ?, ?, ?)");
    $stmt->bind_param('sddi', 
        $user_log_data->time, 
        $user_log_data->latitude,
        $user_log_data->longitude,
        $user_log_data->user_id);
    $stmt->execute();
    $user_log_id = $db_conn->insert_id;
    $stmt->close();
    echo json_encode(array("id" => $user_log_id));
}

?>