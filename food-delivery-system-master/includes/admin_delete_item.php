<?php
    session_start();
?>

<?php
    $database_path = $_SERVER['DOCUMENT_ROOT']."/FoodDelivery-master/includes/database_connect.php";
    require "$database_path";
    
    $delete_item_id = $_POST['delete_item_id'];
    $login_sql_command = "DELETE FROM item WHERE Item_ID='$delete_item_id'";
    mysqli_query($connect, $login_sql_command);
    exit();
?>