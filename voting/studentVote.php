<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CS</title>
    <link rel="stylesheet" href="profcscss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div id="divic">
        <img id="slika" src="ssst_logo.png">
        <h1>University Sarajevo School of <br> Science and Technology</h1>
    </div>
    <div class="navbar">
        <a href="voting.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn" onclick="myFunction()">Vote
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="myDropdown">
                <a href="VoteForProfessor.php">Vote for Professor</a>
                <a href="VoteForStudent.php">Vote for Student</a>
                <a href="view_results.php">View Results</a>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function(e) {
            if (!e.target.matches('.dropbtn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }
    </script>
</header>
<main>
    <section id="candidates">
        <h2>Vote for Student</h2>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $selectedCandidate = $_POST["candidate"];

            $loggedInUser = $_SESSION["user_id"];

            $db_host = 'localhost';
            $db_username = 'root';
            $db_password = '';
            $db_name = 'voting';
            $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

            if (!$conn) {
                die('Database connection error: ' . mysqli_connect_error());
            }

            $positionID = $_GET['position'];

            $insertQuery = "INSERT INTO votes (candidate_id, position_id, vid) VALUES ('$selectedCandidate', '$positionID', '$loggedInUser')";
            if (mysqli_query($conn, $insertQuery)) {

                header("Location: thankyou.php");
                exit;
            } else {
                echo "<p>Error submitting vote: " . mysqli_error($conn) . "</p>";
            }

            mysqli_close($conn);
        }
        ?>
        <form method="POST">
            <select name="candidate" required>
                <option value="" disabled selected>Select a candidate</option>
                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "voting";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $positionID = $_GET['position'];

                $sql = "SELECT * FROM candidate WHERE positions = $positionID";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $firstName = $row['first_name'];
                        $lastName = $row['last_name'];
                        $candidateID = $row['cid'];

                        echo "<option value='$candidateID'>$firstName $lastName</option>";
                    }
                } else {
                    echo "<option disabled>No candidates available</option>";
                }

                $conn->close();
                ?>
            </select>
            <button type="submit">Vote</button>
        </form>
    </section>
</main>
<footer>
    <h4> &copy;University Sarajevo School of Science and Technology ·
        <script>
            date = new Date().toLocaleDateString();
            document.write(date);
        </script>
    </h4>
</footer>
</body>
</html>
