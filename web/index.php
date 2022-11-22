<?php
session_start();
include('includes/header.php') ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="assets/img/wallpaper1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block text-left mb-5">
                <h1 class="fw-bold text-uppercase">Welcome to Domus Website!</h1>
                <a href="categories.php" class="btn btn-domus fw-bold">START SHOPPING</a>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/wallpaper3.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block mb-5">
                <h1 class="fw-bold text-uppercase">All sorts of furniture...</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/wallpaper2.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block text-right mb-5">
                <h1 class="fw-bold text-uppercase">...ready for your home!</h1>
                <a href="categories.php" class="btn btn-domus fw-bold">START SHOPPING</a>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container"> 
    <hr>
    <h6 class="text-center font-weight-light">Diplomski rad, Luka Abramović, FIPU, 2022</h6> </div>


<?php include('includes/footer.php') ?>