<?php
session_start();
?>

<?php
$database_path = $_SERVER['DOCUMENT_ROOT'] . "/FoodDelivery-master/includes/database_connect.php";
require "$database_path";

$login_username = $_POST['login_username'];
$login_password = $_POST['login_password'];

$login_sql_command = "SELECT * FROM user WHERE Username='$login_username' AND Password ='$login_password'";
$result = mysqli_query($connect, $login_sql_command);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck == 1) {
    $_SESSION['loggedIn'] = true;
    $returned_row =  mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $returned_row['User_ID'];
    $_SESSION['username'] = $returned_row['Username'];
    $_SESSION['email'] = $returned_row['Email'];
    $_SESSION['firstname'] = $returned_row['First_Name'];
    $_SESSION['lastname'] = $returned_row['Last_Name'];
    $_SESSION['contactno'] = $returned_row['Contact_No'];
    $_SESSION['address'] = $returned_row['Address'];
    $_SESSION['usertype'] = $returned_row['Type'];

    exit("Valid");
} else {
    exit("Invalid");
}
?>