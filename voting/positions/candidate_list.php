<?php

$conn = mysqli_connect('localhost', 'root', '', 'voting');

$query = mysqli_query($conn, 'select * from candidate');

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'List candidates';?>
    <style>
        table {
            border: 1px solid black;
            border-spacing: 0;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
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
            <th>Cid</th>
            <th>Positions</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?php echo $row['cid']; ?></td>
                <td><?php echo $row['positions']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href="candidate_edit.php?cid=<?php echo $row['cid']; ?>">Edit</a></td>
                <td><a href="candidate_delete.php?cid=<?php echo $row['cid']; ?>">Delete</a></td>

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
        padding: 20px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
</style>
</html>

