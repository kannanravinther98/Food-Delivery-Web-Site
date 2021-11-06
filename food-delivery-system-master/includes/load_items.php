<?php
    session_start();
?>

<?php
    $database_path = $_SERVER['DOCUMENT_ROOT']."/FoodDelivery-master/includes/database_connect.php";
    require "$database_path";
    $login_sql_command = "SELECT * FROM item";
    $result = mysqli_query($connect, $login_sql_command);
    $resultCheck = mysqli_num_rows($result);
    
    $count = 0;
    $closed = true;

    while ($row = mysqli_fetch_assoc($result))
    {
        $item_id = $row['Item_ID'];
        $item_name = $row['Item_Name'];
        $item_description = $row['Item_Description'];
        $item_type = $row['Item_Type'];
        $item_price = $row['Price'];
        $item_image_name = $row['Image'];

        if($count % 3 == 0)
        {
            $closed = false;
            echo
            '
            <div class="row">
            <div class="card-deck">
            ';
        }

        echo
        '<div class="col-sm-30">'
        .'<div class="card" style="width: 22rem;">'
            .'<img class="card-img-top" src="./images/items/'.$item_image_name.'" >'
            .'<div class="card-body">'
                .'<h2 class="card-title">'.$item_name.'</h2>'
                .'<h6 class="card-text">'.$item_description.'</h6>'
                .'<p>'.$item_price.'</p>'
            .'</div>'
                .'<button class="btn btn-success add_to_cart_button" id="add_to_cart_button_'.$item_id.'">Add to cart</button>'
        .'</div>'
        .'</div>'
        ;

        if($count % 3 == 2 AND $count > 0)
        {
            echo
            '</div>'
            .'</div>'
            .'<br>';

            $closed = true;
        }

        $count = $count + 1;
    }

    if($closed == false)
    {
        echo
        '</div>'
        .'</div>'
        .'<br>';
    }

?>