<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    include('../config/connection.php');
    
    $select_banners = "SELECT * FROM banners";
    $select_banners_run = mysqli_query($con,$select_banners);
    
    $result = array();
    $result['banners'] = array();
    
    while($row = mysqli_fetch_assoc($select_banners_run)){
        $index['id'] = $row['id'];
        $index['image'] = $row['image'];
        $index['created_at'] = $row['created_at'];
        
        array_push($result['banners'], $index);
    }
    echo json_encode($result);
}
?>