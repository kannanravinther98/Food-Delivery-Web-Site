<?php
session_start();
?>

<?php
$database_path = $_SERVER['DOCUMENT_ROOT'] . "/FoodDelivery-master/includes/database_connect.php";
require "$database_path";

$order_id = rand(10000000, 99999999);
$user_id = $_POST["user_id"];
$total_price = $_POST["total_price"];
$order_date = $_POST["order_date"];
$order_time = $_POST["order_time"];
$order_status = $_POST["order_status"];
$item_id_count = explode(",", $_POST["item_id_count"]);
$item_id_keys = explode(",", $_POST["item_id_keys"]);

$add_order_sql_command = "INSERT INTO `order`(`Order_ID`,`User_ID`, `Total_Price`, `Order_Date`, `Order_Time`, `Order_Status`)
VALUES ('$order_id','$user_id','$total_price','$order_date','$order_time','$order_status')";

mysqli_query($connect, $add_order_sql_command);

for ($i = 0; $i < count($item_id_count); $i++) {
    $current_item_id = $item_id_keys[$i];
    $current_item_quantity = $item_id_count[$i];

    $add_order_detail_sql_command = "INSERT INTO `orderdetail`(`Order_ID` , `Item_ID`, `Quantity`)
    VALUES ('$order_id', '$current_item_id', '$current_item_quantity')";

    mysqli_query($connect, $add_order_detail_sql_command);
}

exit("Order added successfully");

?>