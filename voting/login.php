<?php
session_start();

if (isset($_POST['uname'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'voting');

    $email = $_POST['uname'];
    $studentId = $_POST['password'];

    $voter = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM voter WHERE email = '$email' AND student_id = '$studentId'"));

    if ($voter) {
        $_SESSION['logged'] = true;
        $_SESSION['user_id'] = $voter['vid'];
        $_SESSION['first_name'] = $voter['first_name'] . ' ' . $voter['last_name'];
        $_SESSION['isAdmin'] = $voter['isAdmin'];
        // Redirect to the home page
        header("Location: voting.php");
        exit();
    } else {
        $error = "Incorrect email and/or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="login.css">
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
    <form action="login.php" method="post">
            <h2>LOGIN</h2>
            <?php if (isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
        <section>
            <div>
                <label>Email</label><br>
                <input type="text" name="uname" required><br>
            </div>
            <div>
                <label>Student ID</label><br>
                <input type="password" name="password" required><br>
            </div>
            <button type="submit">Login</button>
    </form>
        </section>

    <section>
        <p>Don't have an account?
        <a href="signup.php">Sign up!</a> </p>
        <button onclick="window.location.href = 'signup.php'" >Sign Up!</button>

    </section>
</main>



<footer>
    <h4> &copy;University Sarajevo School of Science and Technology ·
        <script>
            date = new Date().toLocaleDateString();
            document.write(date);
        </script>
</footer>
</body>
<style>
    main{
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        padding-top: 100px;

    }
    button{
        background-color: midnightblue;
        color: white;
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 7.5px;
        width: 100px;
        margin-top: 20px;
    }
    button:hover, button:focus {
        background-color: darkblue;
    }
    section{
        font-size: large;
    }
    a{
        text-decoration: none;
    }
</style>
</html>
