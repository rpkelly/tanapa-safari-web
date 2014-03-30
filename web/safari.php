<?php 

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // If no parameters were given, return list of safaris.
    if (empty($_GET)) {
        $results = array("results" => array());
        $safari_select_stmt = $db_conn->prepare("SELECT SAFARI.id, SAFARI.name, SAFARI.description, tile_media_id, TILE_MEDIA.type tile_media_type, TILE_MEDIA.url tile_media_url FROM SAFARI JOIN MEDIA TILE_MEDIA ON TILE_MEDIA.id = SAFARI.tile_media_id");
        $safari_select_stmt->execute();
        $safari_select_stmt->bind_result($safari_id, $safari_name, $safari_description, $tile_media_id, $tile_media_type, $tile_media_url);
        while ($safari_select_stmt->fetch()) {
            $results["results"][] = array(
                "id" => $safari_id,
                "name" => $safari_name,
                "description" => $safari_description,
                "tile_media_id" => $tile_media_id,
                "tile_media_type" => $tile_media_type,
                "tile_media_url" => $tile_media_url
            );
        }
        $safari_select_stmt->close();

        echo json_encode($results);

    }

}
?>