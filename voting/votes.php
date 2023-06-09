<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $selectedProfessor = $_POST['professor'];


    $selectedProfessor = filter_var($selectedProfessor, FILTER_SANITIZE_NUMBER_INT);

    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'voting';
    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }

    $query = "INSERT INTO votes (professor_id) VALUES ('$selectedProfessor')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Vote submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
