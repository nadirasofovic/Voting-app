<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
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
    <main>
        <div>
            <h2>Welcome, Admin!</h2>
            <p>You have access to the following operations: </p>
            <a href="voting.php">Home</a>

        </div>
        <div id="dugmad">
            <button onclick="window.location.href = 'positions/candidate_list.php'" >List of Candidates</button>
            <button onclick="window.location.href = 'positions/candidate_add.php'" >Add Candidates</button>
            <button onclick="window.location.href = 'positions/position_list.php'" >List of Positions</button>
            <button onclick="window.location.href = 'positions/position_add.php'" >Add Positions</button>
            <button onclick="window.location.href = 'positions/voter_list.php'" >List of Voters</button>
            <button onclick="window.location.href = 'positions/voter_add.php'" >Add Voters</button>

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
width: 1000px;
    margin: auto;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    font-size: larger;
    color: darkblue;

}
#dugmad{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr 1fr ;
    column-gap: 25px;
    row-gap: 25px;
}
h2{
    color: darkred;
}
button{
    background-color: midnightblue;
    color: white;
    padding-top: 16px;
    padding-bottom: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    border-radius: 7.5px;
    width: 170px;
}
button:hover, button:focus {
    background-color: darkblue;
}
</style>
</html>

