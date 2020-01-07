<?php
/**
 * Created by PhpStorm.
 * User: saltrupiano
 * Date: 1/7/20
 * Time: 10:33 AM
 */

include "connectToDB.php";

if(!empty($_GET['id'])){
    global $conn;

    $viewQuery = "SELECT * FROM switch";

    $result = $conn->query($viewQuery);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return "Switch ID: " . $row["SW_ID"] . "Switch Name: " . $row["SW_NAME"]. " - Switch Location: " . $row["SW_LOC"]. " - Switch Model: " . $row["SW_MODEL"]. " - Switch MAC Address: " . $row["SW_MAC"]. " - Switch IP: " . $row["SW_IP"]. " - Switch Notes: " . $row["SW_NOTES"]. "<br>";

        }
    }
    else {
        echo "0 results";
    }
}
