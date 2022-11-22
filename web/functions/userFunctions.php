<?php
session_start();
include('config/connection.php');

function getAllActive($table){
    global $con;
    $query = "SELECT * FROM $table WHERE status='0'";
    return $query_run = mysqli_query($con, $query);
}

function getActiveSlug($table, $slug){
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}

function getProductByCategory($category_id){
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0'";
    return $query_run = mysqli_query($con, $query);
}

function getCart(){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.product_id, c.product_quantity, p.id as pid, p.name, p.image, p.selling_price 
                FROM carts c, products p WHERE c.product_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con, $query);
}

function getOrders(){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC";
    return $query_run = mysqli_query($con, $query);
}

function checkTracking($trackingId){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE tracking_id='$trackingId' AND user_id='$userId' ";
    return mysqli_query($con, $query);
}

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}
?>