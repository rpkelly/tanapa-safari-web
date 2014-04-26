<?php 

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    if (isset($_GET['id'])) {

        $results = array();

        // If an ID is sent, retreive that safari's details and return them.
        $stmt = $db_conn->prepare("SELECT * FROM SAFARI_WAYPOINTS WHERE SAFARI_ID = ?");
        $stmt->bind_param('i', $_GET['id']);
        $stmt->execute();
        $stmt->bind_result($waypoint_id, $sequence, $latitude, $longitude, $safari_id);
        while ($stmt->fetch()) {
            $results["results"]["waypoints"][] = array(
                "id" => $waypoint_id,
                "sequence" => $sequence,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "safari_id" => $safari_id,
            );
        }
        $stmt->close();

        $stmt = $db_conn->prepare("SELECT poi.id, poi.name, poi.latitude, poi.longitude, poi.radius, poi.safari_id, m.id poi_media_id, m.type poi_media_type, m.url poi_media_url FROM SAFARI_POINTS_OF_INTEREST poi LEFT JOIN MEDIA m on m.id = poi.media_id WHERE SAFARI_ID = ?");
        $stmt->bind_param('i', $_GET['id']);
        $stmt->execute();
        $stmt->bind_result($poi_id, $name, $latitude, $longitude, $radius, $safari_id, $poi_media_id, $poi_media_type, $poi_media_url);
        while ($stmt->fetch()) {
            $poi = array(
                "id" => $poi_id,
                "name" => $name,
                "latitude" => $latitude,
                "longitude" => $longitude, 
                "radius" => $radius,
                "safari_id" => $safari_id
            );

            if (!empty($poi_media_id)) {
                $media = array(
                    "id" => $poi_media_id,
                    "type" => $poi_media_type,
                    "url" => $poi_media_url
                );
                $poi["media"] = $media;
            } 

            $results["results"]["points_of_interest"][] = $poi;
        }
        $stmt->close();

        echo json_encode($results);
    }

}
?>
