<?php

session_start();

if (isset($_POST['first_name'])) {

    $conn = mysqli_connect('localhost','root','','voting');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];


    $result = mysqli_query($conn, "insert into candidate (first_name, last_name, email) values ('$first_name', '$last_name', '$email')");

    if ($result) {
        header('location: candidate_list.php');
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

</head>
<body>
<header>
    <div id="divic">
        <img id="slika" src="1594381052.png">
        <h1>University Sarajevo School of <br> Science and Technology</h1>
    </div>

</header>
<main class="wrapper">
    <h1>Add candidate</h1>
    <form action="" method="POST">
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name"><br>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name"><br>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email"><br>
        <button type="submit">Submit</button>
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

</style>
</html>
