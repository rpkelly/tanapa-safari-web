<?php

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_data = json_decode(file_get_contents("php://input"));
    $stmt = $db_conn->prepare("INSERT INTO REPORT (report_type_id, content, time, latitude, longitude, user_id) VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issddi', 
        $report_data->report_type_id, 
        $report_data->content,
        $report_data->time,
        $report_data->latitude,
        $report_data->longitude,
        $report_data->user_id);
    $stmt->execute();
    $report_id = $db_conn->insert_id;
    $stmt->close();
    echo json_encode(array("id" => $report_id));
}

?>