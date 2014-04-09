<?php 

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    if (isset($_GET['id'])) {

        // If an ID is sent, retreive that safari's details and return them.
        $stmt = $db_conn->prepare("SELECT * FROM SAFARI_WAYPOINTS WHERE SAFARI_ID = ?");
        $stmt->bind_param('s', $_GET['id']);
        $stmt->execute();
        $stmt->bind_result($waypoint_id, $sequence, $latitude, $longitude, $safari_id);
        while ($stmt->fetch()) {
            $results["results"][] = array(
                "id" => $waypoint_id,
                "sequence" => $sequence,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "safari_id" => $safari_id,
            );
        }
        $stmt->close();
        echo json_encode($results);
    }

}
?>
