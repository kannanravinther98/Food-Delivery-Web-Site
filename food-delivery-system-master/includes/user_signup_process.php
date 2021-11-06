<?php
    session_start();
?>

<?php
    $database_path = $_SERVER['DOCUMENT_ROOT']."/FoodDelivery-master/includes/database_connect.php";
	require "$database_path";
	
	$register_username = $_POST['register_username'];
	$register_password = $_POST['register_password'];
	$register_emailaddress = $_POST['register_emailaddress'];
	$register_firstname = $_POST['register_firstname'];
	$register_lastname = $_POST['register_lastname'];
	$register_phonenumber = $_POST['register_phonenumber'];
	$register_address = $_POST['register_address'];
	$domain = explode('@', $register_emailaddress)[1];
	
	$user_id = rand(100000000,999999999);
	$user_type = "User";

    $add_user_sql_command = 
    "INSERT INTO `user`(`User_ID`, `Username`, `Password`, `Email`, `First_Name`, `Last_Name`, `Contact_no`, `Address`, `Type`)
	VALUES ('$user_id', '$register_username', '$register_password', '$register_emailaddress', '$register_firstname', '$register_lastname', '$register_phonenumber', '$register_address', '$user_type');
	";

    mysqli_query($connect, $add_user_sql_command);
	exit($user_id.$register_username.$register_password.$register_emailaddress.$register_firstname.$register_lastname.$register_phonenumber.$register_address.$user_type);
?>
