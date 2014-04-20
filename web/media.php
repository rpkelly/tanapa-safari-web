<?php
require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    
    // move file to media directory.
    $new_path = "media/" . uniqid() . "." . $extension;
    $media_url = "/" . $new_path;
    move_uploaded_file($_FILES["file"]["tmp_name"], $new_path);
    chmod($new_path, "0777");

    // insert into database.
    $stmt = $db_conn->prepare("INSERT INTO MEDIA (type, url) VALUES(?, ?)");
    $stmt->bind_param('ss', 
        $_FILES["file"]["type"], 
        $media_url);
    $stmt->execute();
    $media_id = $db_conn->insert_id;
    $stmt->close();

    echo json_encode(array("id" => $media_id, "type" => $_FILES["file"]["type"], "url" => $media_url));
}

?>