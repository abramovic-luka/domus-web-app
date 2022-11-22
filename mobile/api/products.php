<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    include('../config/connection.php');
    
    $category_id = $_GET['category_id'];
    
    $select_products = "SELECT * FROM products WHERE category_id=$category_id";
    $select_products_run = mysqli_query($con,$select_products);
    
    $result = array();
    $result['products'] = array();
    
    while($row = mysqli_fetch_assoc($select_products_run)){
        $index['id'] = $row['id'];
        $index['category_id'] = $row['category_id'];
        $index['name'] = $row['name'];
        $index['small_description'] = $row['small_description'];
        $index['selling_price'] = $row['selling_price'];
        $index['quantity'] = $row['quantity'];
        $index['image'] = $row['image'];
        
        array_push($result['products'], $index);
    }
    echo json_encode($result);
}
?>