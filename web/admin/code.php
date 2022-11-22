<?php

include('../config/connection.php');
include('../functions/functions.php');

if(isset($_POST['add_category_btn'])){
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $categories_query = "INSERT INTO categories
    (name,slug,description,status,popular,image)
    VALUES ('$name','$slug','$description','$status','$popular','$filename')";

    $categories_query_run = mysqli_query($con, $categories_query);

    if($categories_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("addCategory.php", "Category Added!");
    }
    else{
        redirect("addCategory.php", "Something Went Wrong!");
    }

}
else if(isset($_POST['update_category_btn'])){
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != ""){
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else{
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description',
    status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run){
        if($_FILES['image']['name'] != ""){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }
        redirect("editCategory.php?id=$category_id", "Category Updated");
    }
    else{
        redirect("editCategory.php?id=$category_id", "Something went wrong");
    }
}
else if(isset($_POST['delete_category_btn'])){
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run){
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }
        echo 200;
    }
    else{
        echo 500;
    }
}
else if(isset($_POST['add_product_btn'])){
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $quantity = $_POST['quantity'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if($name != "" && $slug != "" && $description != ""){
        $product_query = "INSERT INTO products(category_id, name, slug, small_description, description, original_price, selling_price, 
        quantity, status, trending, image) VALUES 
        ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$quantity','$status','$trending','$filename')";

        $product_query_run = mysqli_query($con, $product_query);

        if($product_query_run){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

            redirect("addProduct.php", "Product Added!");
        }
        else{
            redirect("addProduct.php", "Something went wrong");
        }
    }
    else{
        redirect("addProduct.php", "Something is missing");
    }
}
else if(isset($_POST['update_product_btn'])){
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $quantity = $_POST['quantity'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';

    $path = "../uploads";


    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != ""){
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else{
        $update_filename = $old_image;
    }

    $update_product_query = "UPDATE products SET name='$name', slug='$slug', small_description='$small_description', 
    description='$description', original_price='$original_price', selling_price='$selling_price', quantity='$quantity',
    status='$status', trending='$trending', image='$update_filename' WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run){
        if($_FILES['image']['name'] != ""){
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image)){
                unlink("../uploads/".$old_image);
            }
        }
        redirect("editProduct.php?id=$product_id", "Product Updated");
    }
    else{
        redirect("editProduct.php?id=$product_id", "Something went wrong");
    }
}

else if(isset($_POST['delete_product_btn'])){
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run){
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }
        echo 200;
    }
    else{
        echo 500;
    }
}

else if(isset($_POST['add_banner_btn'])){
    $image = $_FILES['image']['name'];

    $path = "../banners";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $banner_query = "INSERT INTO banners (image) VALUES ('$filename')";

    $banner_query_run = mysqli_query($con, $banner_query);

    if($banner_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("banners.php", "Banner Added!");
    }
    else{
        redirect("banners.php", "Something Went Wrong!");
    }

}

else if(isset($_POST['delete_banner_btn'])){
    $banner_id = mysqli_real_escape_string($con, $_POST['banner_id']);

    $banner_query = "SELECT * FROM banners WHERE id='$banner_id' ";
    $banner_query_run = mysqli_query($con, $banner_query);
    $banner_data = mysqli_fetch_array($banner_query_run);
    $image = $banner_data['image'];

    $delete_query = "DELETE FROM banners WHERE id='$banner_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run){
        if(file_exists("../banners/".$image)){
            unlink("../banners/".$image);
        }
        echo 200;
    }
    else{
        echo 500;
    }
}

else{
    header('Location: ../index.php');
}

?>