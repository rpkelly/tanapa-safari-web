<?php 

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $db_conn->prepare("INSERT INTO USER values()");
    $stmt->execute();
    $user_id = $db_conn->insert_id;
    $stmt->close();
    echo json_encode(array("id" => $user_id));
}

?>