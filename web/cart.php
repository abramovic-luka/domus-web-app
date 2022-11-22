<?php
include('functions/userFunctions.php');
include('includes/header.php');
include('auth.php');
?>

<div class="py-3 bg-domus">
    <div class="container">
        <h6 class="text-white"><a href="index.php" class="text-white">Home/</a><a href="cart.php" class="text-white">Cart</h6></a>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class=""> 
            <div class="row">
                <div class="col-md-12">
                    <div id="myCart">
                        <?php
                        $items = getCart();
                        if(mysqli_num_rows($items) > 0){
                            ?>
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <h5>Product</h5>
                                </div>
                                <div class="col-md-2">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Remove</h6>
                                </div>
                            </div>
                            <div id="">
                                <?php
                                    foreach ($items as $cart_item){
                                    ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $cart_item['image'] ?>" alt="Image" width="80px">
                                            </div>
                                            <div class="col-md-3">
                                                <h5><?= $cart_item['name'] ?></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>€<?= $cart_item['selling_price'] ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" class="productId" value="<?= $cart_item['product_id'] ?>">
                                                <div class="input-group mb-3" style="width: 130px;">
                                                    <button class="input-group-text decrease-btn updateQuantity">-</button>
                                                    <input type="text" class="form-control text-center quantity-input bg-white" value="<?= $cart_item['product_quantity'] ?>" disabled>
                                                    <button class="input-group-text increase-btn updateQuantity">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-sm deleteItem" value="<?= $cart_item['cid'] ?>">
                                                <i class="fa fa-trash me-2"></i>Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                ?>
                            </div>
                            <div class="float-end">
                                <a href="checkout.php" class="btn btn-outline-domus">Checkout</a>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="card card-body shadow text-center">
                                <h4 class="py5">
                                    Your cart is empty!
                                </h4>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>