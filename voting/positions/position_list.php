<?php

$conn = mysqli_connect('localhost', 'root', '', 'voting');

$query = mysqli_query($conn, 'select * from position');

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,300&display=swap">
    <?php
    $title = 'List positions';?>
    <style>
        table {
            border: 1px solid black;
            border-spacing: 0;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding:3px;
        }
    </style>
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
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Year</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?php echo $row['pid']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><a href="position_edit.php?pid=<?php echo $row['pid']; ?>">Edit</a></td>
                    <td><a href="position_delete.php?pid=<?php echo $row['pid']; ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <div id="linkovi">
            <a href="../Adminpage.php">Go Back</a>
            <a href="../voting.php">Home</a>
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
        justify-content: center;
        padding: 20px;
        flex-direction: column;
        align-items: center;
    }
</style>
</html>
