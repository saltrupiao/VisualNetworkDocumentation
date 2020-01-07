<?php
/**
 * Created by PhpStorm.
 * User: saltrupiano
 * Date: 1/7/20
 * Time: 10:34 AM
 */

#Sourced from: https://www.w3schools.com/php/php_mysql_connect.asp

$servername = "localhost";
$username = "root";
$password = "oakland";
$dbname = "visualnwdocs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}