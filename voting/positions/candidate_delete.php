<?php

$conn = mysqli_connect('localhost', 'root', '', 'voting');

mysqli_report(MYSQLI_REPORT_ERROR);

$cid = $_GET['cid'];

$result = mysqli_query($conn, 'delete from candidate where cid = ' . $cid);

if ($result) {
    header('location: candidate_list.php');
    exit();
} else {
    echo 'Fail';
}

