<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>The Disaster Café</title>
    <link rel="stylesheet" href="./css/Login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">
</head>

<body>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (isset($_SESSION['loggedIn'])) {
        if ($_SESSION['loggedIn'] == true) {
            header('Location: ./Homepage.php');
        } else {
            require "./includes/navbar-without-login-button.php";
        }
    } else {
        require "./includes/navbar-without-login-button.php";
    }
    ?>
    <div class="content">
        <div class="login-page">
            <div class="form">
                <form class="register-form" id="signup-form" name="signup_form">
                    <input type="text" placeholder="Username" id="register_username" name="register_username" />
                    <input type="password" placeholder="Password" id="register_password" name="register_password" />
                    <input type="text" placeholder="Email Address" id="register_emailaddress" name="register_emailaddress" />
                    <input type="text" placeholder="First Name" id="register_firstname" name="register_firstname" />
                    <input type="text" placeholder="Last Name" id="register_lastname" name="register_lastname" />
                    <input type="text" placeholder="Address" id="register_address" name="register_address" />
                    <input type="text" placeholder="Phone Number" id="register_phonenumber" name="register_phonenumber" />
                    <button type="submit" class="btn" id="signup_button" name="signup_submit"> Register </button>
                    <p class="message">Already Registered? &nbsp; <a href="#"> Login </a></p>
                </form>

                <form class="login-form" id="login-form" name="login_form">
                    <input type="text" id="login_username" placeholder="Username" name="login_username" />
                    <input type="password" id="login_password" placeholder="Password" name="login_password" />
                    <button type="submit" class="btn" id="login_button" name="login_submit"> Login </button>
                    <div id="invalid_credentials">
                    </div>

                    <div class="alert hideclass" id="missing_fields">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        Please fill in all the fields
                    </div>

                    <p class="message">Not Yet Registered? &nbsp; <a href="#"> Register Here </a></p>
                </form>
            </div>
            <br><br><br><br><br><br>
        </div>
    </div>

    <?php
    require "./includes/footer.php";
    ?>

    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src="./js/login.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#login_button").on('click', function() {
                var login_username = $("#login_username").val();
                var login_password = $("#login_password").val();

                if (login_username == "" || login_password == "") {
                    alert("Please fill in the required fields");
                } else {
                    $.ajax({
                        url: './includes/user_login_process.php',
                        method: 'POST',
                        data: {
                            login_username: login_username,
                            login_password: login_password
                        },
                        success: function(response) {
                            if (response.indexOf('Valid') >= 0)
                            {
                                window.location = 'Homepage.php';
                            }

                            else
                                alert("Invalid username or password");
                        },
                        dataType: 'text'
                    });
                }
            });

            $("#signup_button").on('click', function() {

                var register_username = $("#register_username").val();
                var register_password = $("#register_password").val();
                var register_emailaddress = $("#register_emailaddress").val();
                var register_firstname = $("#register_firstname").val();
                var register_lastname = $("#register_lastname").val();
                var register_address = $("#register_address").val();
                var register_phonenumber = $("#register_phonenumber").val();

                if (register_username == "" || register_password == "" || register_emailaddress == "" || register_firstname == "" || register_lastname == "" || register_address == "" || register_phonenumber == "") {
                    alert("Please fill in the required fields");
                } else {
                    $.ajax({
                        url: './includes/user_signup_process.php',
                        method: 'POST',
                        data: {
                            register_username: register_username,
                            register_password: register_password,
                            register_emailaddress: register_emailaddress,
                            register_firstname: register_firstname,
                            register_lastname: register_lastname,
                            register_address: register_address,
                            register_phonenumber: register_phonenumber
                        },
                        success: function(response) {
                            alert(response);
                        },
                        dataType: 'text'
                    });
                }
            });
        });
    </script>
</body>

</html>