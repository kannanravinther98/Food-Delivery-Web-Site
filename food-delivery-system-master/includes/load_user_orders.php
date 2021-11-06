<?php
    session_start();
?>

<?php
    $database_path = $_SERVER['DOCUMENT_ROOT']."/FoodDelivery-master/includes/database_connect.php";
    require "$database_path";

    $select_order_sql_command = "SELECT * FROM `order` ORDER BY `Order_ID` DESC";
    $selected_order = mysqli_query($connect, $select_order_sql_command);

    while ($selected_order_row = mysqli_fetch_assoc($selected_order))
    {
        $order_id = $selected_order_row['Order_ID'];
        $totalprice = $selected_order_row['Total_Price'];
        $order_date =  $selected_order_row['Order_Date'];
        $order_time =  $selected_order_row['Order_Time'];
        $order_status = $selected_order_row['Order_Status'];
        $items = [];
        
        $select_order_item_sql_command = "SELECT * FROM `orderdetail` WHERE Order_ID = '$order_id';";

        $selected_order_item = mysqli_query($connect, $select_order_item_sql_command);
        while ($selected_order_item_row = mysqli_fetch_assoc($selected_order_item))
        {
            $item_id = $selected_order_item_row['Item_ID'];
            $quantity = $selected_order_item_row['Quantity'];
            $item_name = "";

            $select_item_sql_command = "SELECT * FROM `item` WHERE Item_ID = '$item_id';";

            $selected_item = mysqli_query($connect, $select_item_sql_command);
            while ($selected_item_row = mysqli_fetch_assoc($selected_item))
            {
                $item_name = $selected_item_row['Item_Name'];
            }
            $item_string = $item_name.' x'.$quantity.'<br>';
            array_push($items, $item_string); 
        }

        $all_row_items = "";
        foreach($items as $current_item) {
            $all_row_items .= $current_item;
        }
        
        echo 
        '<tr>'.
            '<th scope="row">'.$order_status.'</th>'.
            '<td>'.$order_id.'</td>'.
            '<td>'.$all_row_items.'</td>'.
            '<td>'.'RM '.$totalprice.'</td>'.
            '<td>'.$order_date.'</td>'.
            '<td>'.$order_time.'</td>'.
        '</tr>';
    }
?>