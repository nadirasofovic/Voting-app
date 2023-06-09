<?php

session_start();

if (isset($_POST['first_name'])) {

    $conn = mysqli_connect('localhost','root','','voting');


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $student_id = $_POST['student_id'];



    $result = mysqli_query($conn, "insert into voter (first_name, last_name, email, student_id) values ('$first_name','$last_name', '$email', '$student_id')");

    if ($result) {
        header('location: voting.php');
        exit();
    } else {
        echo 'Fail';
    }

    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="signup_style.css">
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
<main class="wrapper">
    <h1>Sign up</h1>
    <h3>Please enter the needed information to sign up!</h3>
    <div id="id">
    <form action="" method="POST">
        <div>
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name">
        </div>
        <div>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name">
        </div>
        <div>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email">
        </div>
        <div>
        <label for="student_id">Student ID</label><br>
        <input type="text" name="student_id" id="student_id">
        </div>
        <button type="submit">Submit</button>
    </form>
    </div>
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
<style>
    body{
        font-family: 'Open Sans', sans-serif;
        background-color: #f9f9f9;
        min-height: 100vh;
    }
    header{
        background: linear-gradient(45deg, midnightblue, darkred);
        color: #f9f9f9;
        display: flex;
        align-items: baseline;
        justify-content: space-around;
        height: 120px;
    }
    footer{
        display: flex;
        justify-content: space-around;
        align-items: center;
        background: linear-gradient(45deg, midnightblue, darkred);
        color: #f9f9f9;
        margin-top: auto;
    }
    #slika{
        width: 70px;
        height: 70px;
        padding-right: 20px;
    }

    #divic{
        display: flex;
        align-items: center;

    }
    body{
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        padding: 0;
        margin: 0;
    }
    footer{
        margin-top: auto;
    }
    main{
        padding-left: 20px;
        display: flex;
        flex-direction: column;
    }
    #id{
        display: flex;
        flex-direction: column;

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
</style>
</html>
