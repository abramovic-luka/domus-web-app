<?php
session_start();
include('../config/connection.php');

function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getById($table, $id){
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllOrders($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function checkTracking($trackingId){
    global $con;

    $query = "SELECT * FROM orders WHERE tracking_id='$trackingId' ";
    return mysqli_query($con, $query);
}

function checkMobileOrder($orderId){
    global $con;

    $query = "SELECT * FROM mobile_orders WHERE id='$orderId' ";
    return mysqli_query($con, $query);
}

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>