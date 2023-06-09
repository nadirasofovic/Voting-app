<?php

$conn = mysqli_connect('localhost', 'root', '', 'voting');

mysqli_report(MYSQLI_REPORT_ERROR);

$pid = $_GET['pid'];

$result = mysqli_query($conn, 'delete from position where pid = ' . $pid);

if ($result) {
    header('location: position_list.php');
    exit();
} else {
    echo 'Fail';
}
