<?php 

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

	if (!empty($_POST['logs'])) {
		$decoded = json_decode(stripslashes($_POST['logs']));

        // If an ID is sent, retreive that safari's details and return them.
        $stmt = $db_conn->prepare("SELECT SAFARI.id, SAFARI.name, SAFARI.description, header_media_id, HEADER_MEDIA.type header_media_type, HEADER_MEDIA.url header_media_url, footer_media_id, FOOTER_MEDIA.type footer_media_type, FOOTER_MEDIA.url footer_media_url, tile_media_id, TILE_MEDIA.type tile_media_type, TILE_MEDIA.url tile_media_url FROM SAFARI JOIN MEDIA HEADER_MEDIA ON HEADER_MEDIA.id = SAFARI.header_media_id JOIN MEDIA FOOTER_MEDIA ON FOOTER_MEDIA.id = SAFARI.footer_media_id JOIN MEDIA TILE_MEDIA ON TILE_MEDIA.id = SAFARI.tile_media_id WHERE SAFARI.id = ?");
        $stmt->bind_param('i', $_GET['id']);
        $stmt->execute();
        $stmt->bind_result($safari_id, $safari_name, $safari_description, $header_media_id, $header_media_type, $header_media_url, $footer_media_id, $footer_media_type, $footer_media_url, $tile_media_id, $tile_media_type, $tile_media_url);
        $result = array();
        if ($stmt->fetch()){
            $result["id"] = $safari_id;
            $result["name"] = $safari_name;
            $result["description"] = $safari_description;
            $result["header_media_id"] = $header_media_id;
            $result["header_media_type"] = $header_media_type;
            $result["header_media_url"] = $header_media_url;
            $result["footer_media_id"] = $footer_media_id;
            $result["footer_media_type"] = $footer_media_type;
            $result["footer_media_url"] = $footer_media_url;
            $result["tile_media_id"] = $tile_media_id;
            $result["tile_media_type"] = $tile_media_type;
            $result["tile_media_url"] = $tile_media_url;
        };

        $stmt->close();
        echo json_encode($result);
    }

}
?>
