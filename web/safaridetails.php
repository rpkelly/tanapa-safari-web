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
            $results["waypoints"][] = array(
                "id" => $waypoint_id,
                "sequence" => $sequence,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "safari_id" => $safari_id,
            );
        }
        $stmt->close();
        $stmt = $db_conn->prepare("SELECT * FROM SAFARI_POINTS_OF_INTEREST WHERE SAFARI_ID = ?");
        $stmt->bind_param('s', $_GET['id']);
        $stmt->execute();
        $stmt->bind_result($poi_id, $name, $safari_id, $latitude, $longitude, $radius);
        while ($stmt->fetch()) {
            $results["points_of_interest"][] = array(
                "id" => $poi_id,
                "name" => $name,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "safari_id" => $safari_id,
				"radius" => $radius,
            );
        }
        $stmt->close();
        echo json_encode($results);
    }

}
?>
