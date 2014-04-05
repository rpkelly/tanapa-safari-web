<?php

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $results = array("results" => array());
    $stmt = $db_conn->prepare("SELECT id, name FROM REPORT_TYPE");
    $stmt->execute();
    $stmt->bind_result($id, $name);
    while ($stmt->fetch()) {
        $results["results"][] = array(
            "id" => $id,
            "name" => $name
        );
    }
    $stmt->close();
    echo json_encode($results);
}

?>