$(document).ready(function (){

    $(document).on('click','.delete_product_btn', function (e){
        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'product_id':id,
                        'delete_product_btn': true
                    },
                    success: function (response){
                        if(response == 200){
                            swal("Success!", "Product deleted!", "success");
                            $("#product_table").load(location.href + " #product_table");
                        }
                        else if(response == 500){
                            swal("Error!", "Something went wrong!", "error");
                        }
                    }
                });

            }
          });
    });

    $(document).on('click','.delete_category_btn', function (e){

        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'category_id':id,
                        'delete_category_btn': true
                    },
                    success: function (response){
                        if(response == 200){
                            swal("Success!", "Category deleted!", "success");
                            $("#category_table").load(location.href + " #category_table");
                        }
                        else if(response == 500){
                            swal("Error!", "Something went wrong!", "error");
                        }
                    }
                });

            }
          });
    });
    
    $(document).on('click','.delete_banner_btn', function (e){

        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the banner!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'banner_id':id,
                        'delete_banner_btn': true
                    },
                    success: function (response){
                        if(response == 200){
                            swal("Success!", "Banner deleted!", "success");
                            $("#banners_table").load(location.href + " #banners_table");
                        }
                        else if(response == 500){
                            swal("Error!", "Something went wrong!", "error");
                        }
                    }
                });

            }
          });
    });



});