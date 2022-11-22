<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    include('../config/connection.php');
    
    $select_categories = "SELECT * FROM categories";
    $select_categories_run = mysqli_query($con,$select_categories);
    
    $result = array();
    $result['categories'] = array();
    
    while($row = mysqli_fetch_assoc($select_categories_run)){
        $index['id'] = $row['id'];
        $index['name'] = $row['name'];
        $index['description'] = $row['description'];
        $index['image'] = $row['image'];
        $index['created_at'] = $row['created_at'];
        
        array_push($result['categories'], $index);
    }
    echo json_encode($result);
}
?>