<?php
include('../middleware/adminMiddle.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Banners</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload Image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-domus" name="add_banner_btn">Save</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    <div class="card-body" id="banners_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $banners = getAll("banners");

                                if(mysqli_num_rows($banners) > 0){
                                    foreach($banners as $item){
                                        ?>
                                    <tr>
                                        <td> <?= $item['id']; ?> </td>
                                        <td>
                                            <img src="../banners/<?= $item['image']; ?>" height="100px" alt="<?= $item['image']; ?>">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-domus delete_banner_btn" value="<?= $item['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                        <?php 
                                        
                                    }
                                }
                                else{
                                    echo "Nothing to show";
                                }
                            ?>
                        </tbody>
                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>