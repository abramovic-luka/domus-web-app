<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include('../config/connection.php');
    
    $jsondata = file_get_contents('php://input');
    
    $data = json_decode($jsondata, true);
    
    $name = $data['mobile_order']['name'];
    $email = $data['mobile_order']['email'];
    $phone = $data['mobile_order']['phone'];
    $address = $data['mobile_order']['address'];
    $date = $data['mobile_order']['date'];
    $comment = $data['mobile_order']['comment'];
    $tax = $data['mobile_order']['tax'];
    $total_price = $data['mobile_order']['total_price'];
    
    $insert = "INSERT INTO mobile_orders (name,email,phone,address,date,comment,tax,total_price) VALUES ('$name','$email','$phone','$address','$date','$comment','$tax','$total_price')";
    $insert_run = mysqli_query($con, $insert);
    $order_id = mysqli_insert_id($con);
    echo $order_id;
    
    foreach($data['mobile_order_items'] AS $array){
        $amount = $array['amount'];
        $price_item = $array['price_item'];
        $product_id = $array['product_id'];
        $product_name = $array['product_name'];
        
        $insert_items = "INSERT INTO mobile_order_items (order_id,amount,price_item,product_id,product_name) VALUES ('$order_id','$amount','$price_item','$product_id','$product_name')";
        $insert_items_run = mysqli_query($con, $insert_items);
    }
    
    mysqli_close($con);
}
?>