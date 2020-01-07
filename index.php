<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function(){
            $(".openEditBtn").click(function() {
                var getPortID = $(this).attr('id');
                $('#editModalBody').load("viewPort.php?id=" + getPortID) //Sourced from: https://stackoverflow.com/questions/7838238/how-to-get-id-of-clicked-element-with-jquery
                $("#portModal").modal("show")
            });
        });
    </script>

    <title> Title </title>
</head>


<body>
<h1>Visual Network Documentation</h1>

<!--
<img src="48-2.png" usemap="#image-map">

<map name="image-map" class="openModal">

    <area alt="48-p1" title="48-p1" id="prtID[]" coords="34,11,50,25" shape="rect" onclick="alert('This is Port 1')">
    <area alt="48p-2" title="48-p2" fcoords="34,29,50,42" shape="rect" onclick="alert('This is Port 2')">
    <area alt="48-p3" title="48-p3" coords="52,11,67,26" shape="rect" onclick="alert('This is Port 3')">
    <area alt="48-p4" title="48-p4" coords="52,28,68,42" shape="rect" data-toggle="modal" data-target="viewSwitchModal">
</map> -->

<h3>Port Documentation</h3>

<?php
include "connectToDB.php";

global $conn;

$viewQuery = "SELECT * FROM port";

$result = $conn->query($viewQuery);

if ($result->num_rows > 0) {
    echo "<img src=\"48-2.png\" usemap=\"#image-map\"> 
          <map name=\"image-map\" class=\"openModal\">";
    while($row = $result->fetch_assoc()) {
        echo "<area class=\"openEditBtn\" id=\"{$row['PRT_ID']}\" coords=\"34,11,50,25\" shape=\"rect\">";

        # echo "<tr>";
        #echo "<td>{$row['PRT_NUM']}</td>";
        #echo "<td>{$row['PRT_CONDEV']}</td>";
        #echo "<td>{$row['PRT_DEVLOC']}</td>";
        #echo "<td>{$row['PRT_ISUPLINK']}</td>";
        #echo "<td>{$row['PRT_VLAN']}</td>";
        #echo "<td><button type=\"button\" class=\"btn btn-danger openEditBtn\" value='{$row['PRT_ID']}'>Edit</button></td>";
        #echo "</tr>";
    }
    echo "</map>";
}
?>


<!--<div class="table-responsive-lg pt-4">
    <table class="table table-borderless table-striped table-dark table-hover">
        <thead>
        <tr>
            <th>Port Number</th>
            <th>Connected Device</th>
            <th>Jack/Wire Location</th>
            <th>Uplink?</th>
            <th>Port VLAN</th>
        </tr>
        </thead>
        <tbody id="orderTable">
        <?php
            include "connectToDB.php";

            global $conn;

            $viewQuery = "SELECT * FROM port";

            $result = $conn->query($viewQuery);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['PRT_NUM']}</td>";
                    echo "<td>{$row['PRT_CONDEV']}</td>";
                    echo "<td>{$row['PRT_DEVLOC']}</td>";
                    echo "<td>{$row['PRT_ISUPLINK']}</td>";
                    echo "<td>{$row['PRT_VLAN']}</td>";
                    echo "</tr>";
                }
            }
                ?>

        </tbody>
    </table>
</div> -->

<!-- Sourced from: https://getbootstrap.com/docs/4.0/components/modal/ -->

<div class="modal fade" id="portModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Port Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<br><br>

</body>

</html>
