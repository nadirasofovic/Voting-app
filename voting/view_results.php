<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results</title>
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
    <h1>Results</h1>
    <h2>Select Position</h2>
    <form method="post" action="view_results.php">
        <label for="position">Position:</label>
        <select name="position" id="position">
            <option value="14">PSIR Prof</option>
            <option value="13">CS Prof</option>
            <option value="15">ECON Prof</option>
            <option value="1">CS Year 1</option>
            <option value="2">CS Year 2</option>
            <option value="3">CS Year 3</option>
            <option value="4">CS Year 4</option>
            <option value="5">PSIR Year 1</option>
            <option value="6">PSIR Year 2</option>
            <option value="7">PSIR Year 3</option>
            <option value="8">PSIR Year 4</option>
            <option value="9">ECON Year 1</option>
            <option value="10">ECON Year 2</option>
            <option value="11">ECON Year 3</option>
            <option value="12">ECON Year 4</option>
        </select>
        <button type="submit">Show Results</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedPosition = $_POST['position'];

        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'voting';
        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

        if (!$conn) {
            die('Database connection error: ' . mysqli_connect_error());
        }

        $query = "SELECT candidate.cid, candidate.first_name, candidate.last_name, COUNT(votes.vid) AS vote_count
                  FROM candidate
                  LEFT JOIN votes ON candidate.cid = votes.candidate_id
                  WHERE candidate.positions = $selectedPosition
                  GROUP BY candidate.cid
                  HAVING vote_count>0
                  ORDER BY vote_count DESC";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

            echo '<h2>Results</h2>';
            echo '<table>';
            echo '<tr><th>Candidate</th><th>Votes</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                $fullName = $row['first_name'] . ' ' . $row['last_name'];
                $voteCount = $row['vote_count'];
                echo '<tr><td>' . $fullName . '</td><td>' . $voteCount . '</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No results found.</p>';
        }

        mysqli_close($conn);
    }
    ?>
</main>
<footer>
    <h4>&copy; University Sarajevo School of Science and Technology ·
        <script>
            date = new Date().toLocaleDateString();
            document.write(date);
        </script>
    </h4>
</footer>
</body>
</html>
