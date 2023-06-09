<?php

$conn = mysqli_connect('localhost','root','','voting');

if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        $query = "UPDATE candidate SET first_name = '$first_name', last_name = '$last_name' , email = '$email' WHERE cid = $cid";
        $result = mysqli_query($conn, $query);

        if ($result) {

            header('Location: candidate_list.php');
            exit;
        } else {

            echo "Error executing query: " . mysqli_error($conn);
        }
    }

    $query = "SELECT * FROM candidate WHERE cid = $cid";
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
        <title>Edit @ Candidate Voting</title>
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
    <h1>Edit Candidate</h1>
    <form method="POST" action="candidate_edit.php?cid=<?php echo $cid; ?>">
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>"><br><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>"><br><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
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
            align-items: center;
            flex-direction: column;
        }
    </style>
    </html>

    <?php
} else {

    echo " User ID not provided.";
}
?>

