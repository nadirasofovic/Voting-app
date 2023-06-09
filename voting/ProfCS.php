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
    <h1>Computer Science</h1>
    <h2>Choose your vote</h2>
    <?php
    session_start(); // Start the session
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedProfessor = $_POST["professor"];
        $loggedInUser = $_SESSION["user_id"];

        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'voting';
        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

        if (!$conn) {
            die('Database connection error: ' . mysqli_connect_error());
        }

        $query = "INSERT INTO votes (candidate_id, position_id, vid) VALUES ('$selectedProfessor', 13, '$loggedInUser')";
        if (mysqli_query($conn, $query)) {
            header("Location: thankyou.php");
            exit;
        } else {
            echo "<p>Error submitting vote: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
    }
    ?>
    <form method="POST">
        <label for="professor">Select a Professor:</label>
        <select name="professor" id="professor">
            <?php
            $db_host = 'localhost';
            $db_username = 'root';
            $db_password = '';
            $db_name = 'voting';
            $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

            if (!$conn) {
                die('Database connection error: ' . mysqli_connect_error());
            }

            $query = "SELECT cid, first_name, last_name FROM candidate WHERE positions = 13";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $cid = $row['cid'];
                $fullName = $row['first_name'] . ' ' . $row['last_name'];
                echo "<option value='$cid'>$fullName</option>";
            }

            mysqli_close($conn);
            ?>
        </select>
        <input type="submit" value="Vote">
    </form>
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
