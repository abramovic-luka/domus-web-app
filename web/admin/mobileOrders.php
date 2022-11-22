<?php

include('../middleware/adminMiddle.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Mobile Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Total Price</th>
                                <th>View</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $orders = getAllOrders("mobile_orders");

                            if(mysqli_num_rows($orders) > 0){
                                foreach($orders as $item){
                                ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td> <?= $item['name']; ?> </td>
                                        <td> <?= $item['email']; ?> </td>
                                        <td> <?= $item['address']; ?> </td>
                                        <td> <?= $item['total_price']; ?> </td>
                                        <td>
                                            <a href="mobileOrderDetails.php?id=<?= $item['id']; ?>" class="btn btn-domus">Details</a>
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