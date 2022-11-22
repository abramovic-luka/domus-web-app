<?php

include('../middleware/adminMiddle.php');
include('includes/header.php');

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $orderData = checkMobileOrder($order_id);
    if (mysqli_num_rows($orderData) < 0) {
?>
        <h4>Something went wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Something went wrong</h4>
<?php
    die();
}

$data = mysqli_fetch_array($orderData);

?>


<div class="container">
<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-domus">
                            <span class="fs-4">Mobile Order Details</span>
                            <a href="mobileOrders.php" class="btn btn-domus float-end"> <i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['name'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Shipping Date</label>
                                            <div class="border p-1">
                                                <?= $data['date'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Comment</label>
                                            <div class="border p-1">
                                                <?= $data['comment'] ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $order_query = "SELECT mobile_orders.id, mobile_order_items.*
                                                FROM mobile_orders, mobile_order_items 
                                                WHERE mobile_order_items.order_id=mobile_orders.id 
                                                AND mobile_orders.id=$order_id";
                                                
                                                $order_query_run = mysqli_query($con, $order_query);

                                                if(mysqli_num_rows($order_query_run) > 0){
                                                    foreach($order_query_run as $item){
                                                        ?>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <?= $item['product_id']; ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $item['product_name']; ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $item['price_item']; ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $item['amount']; ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5>Total Price: <span class="float-end fw-bold"><?= $data['total_price']; ?></span></h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

<?php include('includes/footer.php') ?>