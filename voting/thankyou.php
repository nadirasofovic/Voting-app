<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank you for voting</title>
    <link rel="stylesheet" href="thankyou.css">
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
    <div class="dropdown">
      <button class="dropbtn" onclick="myFunction()">Vote
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content" id="myDropdown">
          <a href="VoteForProfessor.php">Vote for Professor</a>
          <a href="VoteForStudent.php">Vote for Student</a>
          <a href="view_results.php">View Results</a>
      </div>
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
  <h1>Thank you for voting!</h1>
  <h2>Your vote has been registered.</h2>
    <a href="voting.php">Go back to <span>home page</span></a>
</main>
<footer>
  <h4>    &copy;University Sarajevo School of Science and Technology ·
    <script>
      date = new Date().toLocaleDateString();
      document.write(date);
    </script>
  </h4>
</footer>
</body>
</html>