<?php

include('../middleware/adminMiddle.php');
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-lg-7 position-relative z-index-2">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column">
                                        <h2 class="font-weight-bolder mb-0">Admin Dashboard</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                            <div class="card  mb-3">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <a href="orders.php"><i class="material-icons opacity-10">table_view</i></a>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">View</p>
                                        <a href="orders.php"><h4 class="mb-0">Web Orders</h4></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card  mb-3">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <a href="mobileOrders.php"><i class="material-icons opacity-10">table_view</i></a>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">View</p>
                                        <a href="mobileOrders.php"><h4 class="mb-0">Mobile Orders</h4></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card  mb-3">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <a href="category.php"><i class="material-icons opacity-10">table_view</i></a>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Show all existing</p>
                                        <a href="category.php"><h4 class="mb-0">Categories</h4></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card  mb-3">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <a href="addCategory.php"><i class="material-icons opacity-10">add</i></a>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Add New</p>
                                        <a href="addCategory.php"><h4 class="mb-0">Category</h4></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card  mb-3">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <a href="products.php"><i class="material-icons opacity-10">table_view</i></a>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Show all existing</p>
                                        <a href="products.php"><h4 class="mb-0">Products</h4></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card  mb-3">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <a href="addProduct.php"><i class="material-icons opacity-10">add</i></a>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Add New</p>
                                        <a href="addProduct.php"><h4 class="mb-0">Product</h4></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card  mb-3">
                                <div class="card-header p-3 pt-2">
                                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <a href="banners.php"><i class="material-icons opacity-10">dashboard</i></a>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Handle</p>
                                        <a href="banners.php"><h4 class="mb-0">Banners</h4></a>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>