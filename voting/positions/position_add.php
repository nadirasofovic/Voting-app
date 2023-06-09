<?php

session_start();

if (isset($_POST['name'])) {

    $conn = mysqli_connect('localhost','root','','voting');

    $name = $_POST['name'];
    $year = $_POST['year'];
    $department = $_POST['department'];


    $result = mysqli_query($conn, "insert into position (name, year, department ) values ('$name', '$year', '$department')");

    if ($result) {
        header('location: position_list.php');
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
    <h1>Add Position</h1>
    <form action="" method="POST">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"> <br>
        <label for="year">Year</label><br>
        <input type="int" name="year" id="year"><br>
        <label for="department">Department</label><br>
        <input type="text" name="department" id="department"><br>
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
    #id{
        display: flex;
        flex-direction: column;

    }
</style>
</html>
