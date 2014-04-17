<?php 

require('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // If no parameters were given, return list of safaris.
    if (empty($_GET)) {
        $results = array("results" => array());
        $db_conn->query("INSERT INTO USER VALUES (NULL)");
        $user_id = $db_conn->insert_id;
            $results["results"][] = array(
                "id" => $user_id
            );
        $db_conn->close();
		echo json_encode($results);

    }
}
?>
