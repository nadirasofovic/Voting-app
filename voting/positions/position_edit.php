<?php

$conn = mysqli_connect('localhost','root','','voting');

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['name'];
        $department = $_POST['department'];
        $year = $_POST['year'];

        $query = "UPDATE position SET name = '$name' , department = '$department', year = '$year' WHERE pid = $pid";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: position_list.php');
            exit;
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    }

    $query = "SELECT * FROM position WHERE pid = $pid";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo " User not found.";
        exit;
    }
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit @ Voting</title>
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
    <div id="move">
    <h1>Edit Position</h1>
    <form method="POST" action="position_edit.php?pid=<?php echo $pid; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br><br>
        <label for="year">Year:</label><br>
        <input type="int" id="year" name="year" value="<?php echo $user['year']; ?>"><br><br>
        <label for="department">Department:</label><br>
        <input type="text" id="department" name="department" value="<?php echo $user['department']; ?>"><br><br>
        <input type="submit" value="Save">
    </form>
    </div>
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
        }
        #move {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

    </style>
    </html>

    <?php
} else {

    echo " User ID not provided.";
}
?>

