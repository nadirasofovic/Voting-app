<?php

$conn = mysqli_connect('localhost', 'root', '', 'voting');

mysqli_report(MYSQLI_REPORT_ERROR);

$vid = $_GET['vid'];

$result = mysqli_query($conn, 'delete from voter where vid = ' . $vid);

if ($result) {
    header('location: voter_list.php');
    exit();
} else {
    echo 'Fail';
}


