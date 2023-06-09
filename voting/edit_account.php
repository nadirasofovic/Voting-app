<?php

$conn = mysqli_connect('localhost','root','','voting');

if (isset($_GET['vid'])) {
    $vid = $_GET['vid'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['first_name'];
        $last = $_POST['last_name'];

        $query = "UPDATE voter SET first_name = '$name', last_name = '$last' WHERE vid = $vid";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: voter_list.php');
            exit;
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    }

    $query = "SELECT * FROM voter WHERE vid = $vid";
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
        <title>Edit @ Voter Voting</title>
    </head>
    <body>
    <header>
        <div id="divic">
            <img id="slika" src="1594381052.png">
            <h1>University Sarajevo School of <br> Science and Technology</h1>
        </div>

    </header>
    <h1>Edit Voter</h1>
    <form method="POST" action="voter_edit.php?vid=<?php echo $vid; ?>">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>"><br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>"><br><br>
        <input type="submit" value="Save">
    </form>
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
            width: 1000px;
            margin: auto;
            display: block;
        }
    </style>
    </html>

    <?php
} else {
    echo " User ID not provided.";
}
?>
<?php
