<?php
session_start();
?>

<?php
$database_path = $_SERVER['DOCUMENT_ROOT'] . "/FoodDelivery-master/includes/database_connect.php";
require "$database_path";

$test = explode(".", $_FILES["file"]["name"]);
$extension = end($test);
$name = $_FILES["file"]["name"];
$location = '../images/items/' . $name;
move_uploaded_file($_FILES["file"]["tmp_name"], $location);

$add_item_name = $_POST['add_item_name'];
$add_item_description = $_POST['add_item_description'];
$add_item_type = $_POST['add_item_type'];
$add_item_price = $_POST['add_item_price'];
$add_item_image_name = $name;

$add_item_sql_command =
    "INSERT INTO `item`(`Item_name`, `Item_Description`, `Item_Type`, `Price`, `Image`) 
    VALUES ('$add_item_name', '$add_item_description', '$add_item_type', '$add_item_price', '$add_item_image_name')";

mysqli_query($connect, $add_item_sql_command);

exit();


?>