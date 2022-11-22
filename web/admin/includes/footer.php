<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12 text-center">
                Luka Abramović, Diplomski Rad, FIPU, 2022
            </div>
        </div>
    </div>
</footer>
</main>

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/smooth-scrollbar.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>

<script src="assets/js/material-dashboard.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="assets/js/custom.js"></script>


<!-- AlertifyJS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>

    <?php
    if(isset($_SESSION['message'])){ 
    ?>
    alertify.set('notifier', 'position', 'top-center');
    alertify.success('<?= $_SESSION['message']; ?>');
    <?php 
    unset($_SESSION['message']);
    } 
    ?>
</script>

</body>

</html>