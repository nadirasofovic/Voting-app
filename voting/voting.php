<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
    <link rel="stylesheet" href="voting.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <div id="divic">
        <img id="slika" src="ssst_logo.png" alt="slika">
        <h1>University Sarajevo School of <br> Science and Technology</h1>
    </div>
    <div class="navbar">
        <?php
        session_start();

        if (isset($_SESSION['logged'])) {
            $name = $_SESSION['first_name'];
            $surname = $_SESSION['last_name'];
            $vid = $_SESSION['vid'];
            $isAdmin = $_SESSION['isAdmin'];

            echo "<a href='logout.php'>Logout</a>";

            if ($isAdmin == 1) {
                echo "<a href='Adminpage.php'>Admin</a>";
            }

            echo "<div class='dropdown'>";
            echo "<button class='dropbtn' onclick='myFunction()'>Vote";
            echo "<i class='fa fa-caret-down'></i>";
            echo "</button>";
            echo "<div class='dropdown-content' id='myDropdown'>";
            echo "<a href='VoteForProfessor.php'>Vote for Professor</a>";
            echo "<a href='VoteForStudent.php'>Vote for Student</a>";
            echo "<a href='view_results.php'>View Results</a>";
            echo "</div>";
            echo "</div>";


        } else {
            echo "<a href='login.php'>Log In</a>";
        }
        ?>

    </div>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function (e) {
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
    <div id="div1">
        <?php

        if (isset($_SESSION['logged'])) {

            echo "<p>Welcome, $name $surname!</p>";

            echo "<p>Your Vote,<br><span>Your Voice</span></p>";
            echo "<div class='dropdown1'>";
            echo "<button onclick='myFunction1()' class='dropbtn1'>Vote Now</button>";
            echo "<div id='myDropdown1' class='dropdown-content1'>";
            echo "<a href='VoteForProfessor.php'>Vote for Professor</a>";
            echo "<a href='VoteForStudent.php'>Vote for Student</a>";
            echo "</div>";
            echo "</div>";

            echo "<script>
                function myFunction1() {
                    document.getElementById('myDropdown1').classList.toggle('show1');
                }

                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn1')) {
                        var dropdowns = document.getElementsByClassName('dropdown-content1');
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show1')) {
                                openDropdown.classList.remove('show1');
                            }
                        }
                    }
                }
            </script>";
        } else {
            echo "<p>Login to access voting options.</p>";
            echo "<p>Your Vote,<br><span>Your Voice</span></p>";
            echo "<div class='dropdown1'>";
            echo "<div id='myDropdown1' class='dropdown-content1'>";
            echo "<span>Login to vote</span>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

    <?php

    if (isset($_SESSION['logged'])) {
        echo "<img src='vote.png' alt='Vote Now!'>";
    }
    ?>
</main>

<section>
    <h5> At the end of each academic department, it's important to recognize outstanding achievements among both students and faculty. One way to do this is through a voting process to determine the best student and best professor of the department. By giving recognition to those who have gone above and beyond in their academic pursuits, we encourage a culture of excellence and inspire others to strive for their own personal best. Voting provides a fair and democratic way for the community to come together and acknowledge those who have made a significant impact over the past department. </h5>
</section>

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