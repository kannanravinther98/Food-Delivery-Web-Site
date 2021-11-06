<?php
    session_start();
    if(isset($_SESSION['login_username']))
    {
        $username = $_SESSION['login_username'];
    }

    
    if(isset($_SESSION['loggedIn']))
    {
        $isLogin = $_SESSION['loggedIn'];
    }
?>

<html>
    
<head>
    <title>The Disaster Café</title>
    <link rel="stylesheet" href="./css/homepage.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
   
</head>
<body>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        if(isset($_SESSION['loggedIn']))
        {
            if($_SESSION['loggedIn'] == true)
            {
                require "./includes/navbar-with-logout-button.php";
            }
            else
            {
                require "./includes/navbar-with-login-button.php";
            }
        }

        else
        {
            require "./includes/navbar-with-login-button.php";
        }
    ?>
    <div class="content">
    <h1>Making Food Taste Better.</h1>
    <div class="form">
        <form class = "Search-box">
            <input type="text" placeholder="Type to search ..."/> &nbsp;&nbsp;&nbsp;&nbsp;
            <button>Search</button>
        </form>
        
        
    </div>
        
    <h2> Our Specialities </h2>
        <div class="Specialities" >
            <img src="./images/website-images/S6.jpg">
            <img src="./images/website-images/S7.jpeg">
            <img src="./images/website-images/S8.jpeg">
            <img src="./images/website-images/S9.jpeg">
        </div> 
        <br>
    <br>
    <br>
    
    </div>
    <div class="footer">
        <div class="logo">
        <a href="Homepage.html">The Disaster Café</a>
        </div>
        <h4>Call Us for any queries : +6016-XXXXXXX </h4>
        
    </div>
</body>
</html>
