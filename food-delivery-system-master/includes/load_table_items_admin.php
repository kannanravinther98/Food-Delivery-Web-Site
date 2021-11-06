<?php
    session_start();
?>

<?php
    $database_path = $_SERVER['DOCUMENT_ROOT']."/FoodDelivery-master/includes/database_connect.php";
    require "$database_path";
    $select_item_sql_command = "SELECT * FROM item ORDER BY `Item_ID` DESC";
    $result = mysqli_query($connect, $select_item_sql_command);
    $resultCheck = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result))
    {
        $item_id = $row['Item_ID'];
        $item_name = $row['Item_Name'];
        $item_description =  $row['Item_Description'];
        $item_type =  $row['Item_Type'];
        $item_price = $row['Price'];
        $item_image_name = $row['Image'];
        echo
        '<tr>'
            .'<td class="item_id">'.$item_id.'</td>'
            .'<td class="item_name">'.$item_name.'</td>'
            .'<td class="item_description" style="text-align:left">'.$item_description.'</td>'
            .'<td class="item_type">'.$item_type.'</td>'
            .'<td class="item_price">'.$item_price.'</td>'
            .'<td>'.'<img src="./images/items/'.$item_image_name.'" style="height: 150px; width:150px;">'.'</td>'
            .'<td><button class="btn editItemButton" id="editItemButton_'.$item_id.'" data-toggle="modal" data-target="#modalEditItemForm"><img src="./images/website-images/edit.svg" alt="" width="30" height="30" title="Edit"></button>'
            .'<button class="btn deleteItemButton" id="deleteItemButton_'.$item_id.'" data-toggle="modal" data-target="#modalDeleteItemConfirmation"><img src="./images/website-images/trash.svg" alt="" width="30" height="30" title="Delete"></button>'
            .'</td>'
        .'</tr>'
        ;
    }

?>