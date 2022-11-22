<?php
include('functions/userFunctions.php');
include('includes/header.php');
include('auth.php');
?>

<div class="py-3 bg-domus">
    <div class="container">
        <h6 class="text-white"><a href="index.php" class="text-white">Home/</a><a href="myOrders.php" class="text-white">My Orders</h6></a>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class=""> 
            <div class="row">
                <div class="col-md-12">
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
                            $orders = getOrders();

                            if(mysqli_num_rows($orders) > 0){
                                foreach($orders as $item){
                                ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td> <?= $item['tracking_id']; ?> </td>
                                        <td> <?= $item['total_price']; ?> </td>
                                        <td> <?= $item['created_at']; ?> </td>
                                        <td>
                                            <a href="viewOrder.php?t=<?= $item['tracking_id']; ?>" class="btn btn-domus">Details</a>
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