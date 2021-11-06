<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/admin_login.css">	
  </head>
  
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">
					<span class="login100-form-title-1">
						Admin Sign In
					</span>
				</div>

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<input class="input100" id="admin_username" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<input class="input100" id="admin_password" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn" style="margin-top:25px;">
						<button class="login100-form-btn" id="login_button" style="width: 100%">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script type="text/javascript">
		(function ($) {
			"use strict";

			/*==================================================================
			[ Focus Contact2 ]*/
			$('.input100').each(function(){
				$(this).on('blur', function(){
					if($(this).val().trim() != "") {
						$(this).addClass('has-val');
					}
					else {
						$(this).removeClass('has-val');
					}
				})    
			})

			/*==================================================================
			[ Validate ]*/
			var input = $('.validate-input .input100');

			$('.validate-form').on('submit',function(){
				var check = true;

				for(var i=0; i<input.length; i++) {
					if(validate(input[i]) == false){
						showValidate(input[i]);
						check=false;
					}
				}

				return check;
			});


			$('.validate-form .input100').each(function(){
				$(this).focus(function(){
				hideValidate(this);
				});
			});

			function validate (input) {
				if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
					if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
						return false;
					}
				}
				else {
					if($(input).val().trim() == ''){
						return false;
					}
				}
			}

			function showValidate(input) {
				var thisAlert = $(input).parent();

				$(thisAlert).addClass('alert-validate');
			}

			function hideValidate(input) {
				var thisAlert = $(input).parent();

				$(thisAlert).removeClass('alert-validate');
			}
			

		})(jQuery);
	</script>

	<script type="text/javascript">
			$("#login_button").on('click', function () {
				var admin_username = $("#admin_username").val();
				var admin_password = $("#admin_password").val();
				
				if(admin_username == "" || admin_password == "")
				{
				}
				else
				{
					$.ajax(
						{
							url: './includes/admin_login_process.php',
							method: 'POST',
							data: {
								admin_username: admin_username,
								admin_password: admin_password
							},
							success: function(response){
								if(response.indexOf('Valid') >= 0)
                                    window.location = './Admin Page.php';
                                else
                                    alert("Invalid username or password");
							},
							dataType: 'text'
						}
					);
				}
			});
	</script>
</body>
  
</html>