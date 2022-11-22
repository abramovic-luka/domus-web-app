<?php
include('functions/userFunctions.php');
include('includes/header.php');
include('auth.php');
?>

<div class="py-3 bg-domus">
    <div class="container">
        <h6 class="text-white"><a href="index.php" class="text-white">Home/</a><a href="checkout.php" class="text-white">Checkout</h6></a>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/orderFunctions.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" required placeholder="Enter your full name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-Mail</label>
                                    <input type="email" name="email" required placeholder="Enter your full name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" required placeholder="Enter your full name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="text" name="pin" required placeholder="Enter your full name" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" required class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                            <?php $items = getCart();
                            $totalPrice = 0;
                            foreach ($items as $cart_item) {
                            ?>
                                <div class="mb-1 border">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $cart_item['image'] ?>" alt="image" width="60px">
                                        </div>
                                        <div class="col-md-5">
                                            <label><?= $cart_item['name'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label><?= $cart_item['selling_price'] ?></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label><?= $cart_item['product_quantity'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $totalPrice += $cart_item['selling_price'] * $cart_item['product_quantity'];
                            }
                            ?>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold"><?= $totalPrice ?></span> </h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrder" class="btn btn-domus w-100">Place order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>