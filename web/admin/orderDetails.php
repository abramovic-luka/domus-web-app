<?php

include('../middleware/adminMiddle.php');
include('includes/header.php');

if (isset($_GET['t'])) {
    $tracking_id = $_GET['t'];

    $orderData = checkTracking($tracking_id);
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
                            <span class="fs-4">Order Details</span>
                            <a href="orders.php" class="btn btn-domus float-end"> <i class="fa fa-reply"></i> Back</a>
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
                                            <label class="fw-bold">Tracking ID</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_id'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Pin Code</label>
                                            <div class="border p-1">
                                                <?= $data['pin'] ?>
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
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                     
                                            <?php
                                                $order_query = "SELECT o.id as oid, o.tracking_id, o.user_id, oi.*, oi.quantity as oquantity, p.* FROM  orders o, order_items oi, 
                                                    products p WHERE oi.order_id=o.id AND p.id=oi.product_id 
                                                    AND o.tracking_id='$tracking_id' ";
                                                $order_query_run = mysqli_query($con, $order_query);

                                                if(mysqli_num_rows($order_query_run) > 0){
                                                    foreach($order_query_run as $item){
                                                        ?>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                                    <?= $item['name']; ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $item['price']; ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $item['oquantity']; ?>
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
                                    
                                    <hr>

                                    <label class="fw-bold">Payment Mode:</label>
                                    <div class="border p-1 mb-3">
                                        <?= $data['payment_mode']; ?>
                                    </div>

                                    <label class="fw-bold">Status:</label>
                                    <div class="border p-1 mb-3">
                                        <?php
                                            if($data['status'] == 0){
                                                echo "Processing";
                                            }
                                            else if($data['status'] == 1){
                                                echo "Completed";
                                            }
                                            else if($data['status'] == 2){
                                                echo "Canceled";
                                            }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

<?php include('includes/footer.php') ?>