<?php

include('../middleware/adminMiddle.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Web Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking ID</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            $orders = getAllOrders("orders");

                            if(mysqli_num_rows($orders) > 0){
                                foreach($orders as $item){
                                ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td> <?= $item['tracking_id']; ?> </td>
                                        <td> <?= $item['total_price']; ?> </td>
                                        <td> <?= $item['created_at']; ?> </td>
                                        <td>
                                            <a href="orderDetails.php?t=<?= $item['tracking_id']; ?>" class="btn btn-domus">Details</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan="5">No orders to show </td>
                                    </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>