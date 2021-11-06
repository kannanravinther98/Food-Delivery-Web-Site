<?php
session_start();
?>

<?php
$database_path = $_SERVER['DOCUMENT_ROOT'] . "/FoodDelivery-master/includes/database_connect.php";
require "$database_path";

$login_username = $_POST['admin_username'];
$login_password = $_POST['admin_password'];

$login_sql_command = "SELECT * FROM `user` WHERE `Username`='$login_username' AND `Password`='$login_password' AND `Type`='Admin'";
$result = mysqli_query($connect, $login_sql_command);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck == 1) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['login_username'] = $login_username;
    exit("Valid");
} else {
    exit("Invalid");
}
?>