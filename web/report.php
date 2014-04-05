<?php

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $db_conn->prepare("INSERT INTO REPORT (report_type_id, content, time, latitude, longitude, user_id) VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issddi', 
        $_POST["report_type_id"], 
        $_POST["content"],
        $_POST["time"],
        $_POST["latitude"],
        $_POST["longitude"],
        $_POST["user_id"]);
    $stmt->execute();
    $report_id = $db_conn->insert_id;
    $stmt->close();
    echo json_encode(array("id" => $report_id));
}

?>