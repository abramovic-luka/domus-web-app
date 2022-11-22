<?php

session_start();
include('../config/connection.php');

if (isset($_SESSION['auth'])) {

    if (isset($_POST['placeOrder'])) {

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $pin = mysqli_real_escape_string($con, $_POST['pin']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);


        if ($name == "" || $email == "" || $phone == "" || $pin == "" || $address == "") {
            $_SESSION['message'] = "Make sure all fields are filled";
            header('Location: ../checkout.php');
            exit(0);
        }

        $userId = $_SESSION['auth_user']['user_id'];
        $query = "SELECT c.id as cid, c.product_id, c.product_quantity, p.id as pid, p.name, p.image, p.selling_price 
                    FROM carts c, products p WHERE c.product_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
                    
        $query_run = mysqli_query($con, $query);

        $totalPrice = 0;
        foreach ($query_run as $cart_item) {
            $totalPrice += $cart_item['selling_price'] * $cart_item['product_quantity'];
        }

        $tracking_id = "domusorder" . rand(1111,9999).substr($phone,2);
        $insert_query = "INSERT INTO orders (tracking_id, user_id, name, email, phone, address, pin, total_price, payment_mode, payment_id) VALUES ('$tracking_id', '$userId', '$name', '$email', '$phone', '$address', '$pin', '$totalPrice', '$payment_mode', '$payment_id')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run){
            $order_id = mysqli_insert_id($con);
            foreach ($query_run as $cart_item) {
                $product_id = $cart_item['product_id'];
                $product_quantity = $cart_item['product_quantity'];
                $price = $cart_item['selling_price'];

                $insert_items_query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES
                ('$order_id','$product_id','$product_quantity','$price')";
                $insert_items_query_run = mysqli_query($con, $insert_items_query);

                $product_query = "SELECT * FROM products WHERE id='$product_id' LIMIT 1";
                $product_query_run = mysqli_query($con, $product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $find_quantity = $productData['quantity'];

                $new_quantity = $find_quantity - $product_quantity;

                $updateQty_query = "UPDATE products SET quantity='$new_quantity' WHERE id='$product_id' ";
                $updateQty_query_run = mysqli_query($con, $updateQty_query);
            }

            $deleteCartQuery = "DELETE FROM carts WHERE user_id = '$userId'";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);

            $_SESSION['message'] = "Order successfully placed!";
            header('Location: ../myOrders.php');
            die();
        }
    }
} else {
    header('Location: ../index.php');
}
