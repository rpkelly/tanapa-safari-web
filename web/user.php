<?php 

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // If no parameters were given, return list of safaris.
    if (empty($_GET)) {
        $results = array("results" => array());
        $stmt = $db_conn->prepare("INSERT INTO user VALUES ()");
        $stmt->execute();
		$stmt = $db_conn->prepare("SELECT LAST_INSERT_ID()");
        $stmt->bind_result($user_id);
        while ($stmt->fetch()) {
            $results["results"][] = array(
                "id" => $user_id
            );
        }
        $stmt->close();
        echo json_encode($results);

    }
}
?>
