<?php
/**
 * Created by PhpStorm.
 * User: saltrupiano
 * Date: 1/7/20
 * Time: 12:43 PM
 */

include "connectToDB.php";

if(!empty($_GET['id'])){
    global $conn;

    $prtIDIn = $_GET['id'];

    $viewQuery = "SELECT * FROM port WHERE PRT_ID = {$prtIDIn}";

    $result = $conn->query($viewQuery);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            # return "Switch ID: " . $row["SW_ID"] . "Switch Name: " . $row["SW_NAME"]. " - Switch Location: " . $row["SW_LOC"]. " - Switch Model: " . $row["SW_MODEL"]. " - Switch MAC Address: " . $row["SW_MAC"]. " - Switch IP: " . $row["SW_IP"]. " - Switch Notes: " . $row["SW_NOTES"]. "<br>";
            echo "<div class=\"table-responsive-lg pt-4\">
    <table class=\"table table-borderless table-striped table-dark table-hover\">
        <thead>
        <tr>
            <th>Port Number</th>
            <th>Connected Device</th>
            <th>Jack/Wire Location</th>
            <th>Uplink?</th>
            <th>Port VLAN</th>
        </tr>
        </thead>
        <tbody id=\"orderTable\">";

            include "connectToDB.php";

            global $conn;

            $viewQuery = "SELECT * FROM port WHERE PRT_ID = {$prtIDIn}";

            $result = $conn->query($viewQuery);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['PRT_NUM']}</td>";
                    echo "<td>{$row['PRT_CONDEV']}</td>";
                    echo "<td>{$row['PRT_DEVLOC']}</td>";
                    echo "<td>{$row['PRT_ISUPLINK']}</td>";
                    echo "<td>{$row['PRT_VLAN']}</td>";
                    echo "<td><button type=\"button\" class=\"btn btn-danger openEditBtn\" value='{$row['PRT_ID']}'>Edit</button></td>";
                    echo "</tr>";
                }
            }
            echo "</tbody></table></div>";
        }
    }
    else {
        echo "0 results";
    }
}