<?php
    session_start();
?>

<?php
    require './database_connect.php';

    $edit_item_id = $_POST['edit_item_id'];
    $edit_item_name = $_POST['edit_item_name'];
    $edit_item_description = $_POST['edit_item_description'];
    $edit_item_type = $_POST['edit_item_type'];
    $edit_item_price = $_POST['edit_item_price'];

    if(isset($_FILES["file"]))
    {
        $test = explode(".", $_FILES["file"]["name"]);
        $extension = end($test);
        $name = $_FILES["file"]["name"];
        $location = '../images/items/'.$name;
        move_uploaded_file($_FILES["file"]["tmp_name"], $location);
        $edit_item_image_name = $name;
        $edit_item_sql_command = 
        "
        UPDATE `item` SET Image='$edit_item_image_name' WHERE `Item_ID`='$edit_item_id';
        ";
        mysqli_query($connect, $edit_item_sql_command);
    }

    $edit_item_sql_command = 
    "
    UPDATE `item` SET Item_Name='$edit_item_name', `Item_Description`='$edit_item_description', `Item_Type`='$edit_item_type', 
    `Price`='$edit_item_price' WHERE `Item_ID`='$edit_item_id';
    ";

    mysqli_query($connect, $edit_item_sql_command);

    exit();


?>