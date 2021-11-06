<?php
session_start();
?>

<?php
require './database_connect.php';

$user_id = $_POST['user_id'];
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];

if (isset($_FILES["file"])) {
    $edit_account_sql_command =
        "
        UPDATE `user` SET `Password`='$password' WHERE `User_ID`='$user_id';
        ";
    mysqli_query($connect, $edit_account_sql_command);
}

$edit_account_sql_command =
    "
    UPDATE `user` SET `First_Name`='$firstname', `Last_Name`='$lastname', `Contact_No`='$phonenumber', `Address`='$address' WHERE `User_ID`='$user_id';
    ";
mysqli_query($connect, $edit_account_sql_command);

$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['contactno'] = $phonenumber;
$_SESSION['address'] = $address;

exit("Account updated successfully");


?>