$(document).ready(function (){

    $(document).on('click','.increase-btn', function(e){
        e.preventDefault();

        var quantity = $(this).closest('.product_data').find('.quantity-input').val();
        
        var value = parseInt(quantity, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            $(this).closest('.product_data').find('.quantity-input').val(value);
        }
    });

    $(document).on('click','.decrease-btn', function(e){
        e.preventDefault();

        var quantity = $(this).closest('.product_data').find('.quantity-input').val();
        
        var value = parseInt(quantity, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.product_data').find('.quantity-input').val(value);
        }
    });

    $(document).on('click','.cartButton', function(e){
        e.preventDefault();

        var quantity = $(this).closest('.product_data').find('.quantity-input').val();
        var product_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/cartFunction.php",
            data: {
                "product_id": product_id,
                "product_quantity": quantity,
                "scope": "add"
            },
            success: function(response){
                if(response == 201){
                    alertify.success("Product added to cart");
                }
                else if(response == "exists"){
                    alertify.success("Product already in cart");
                }
                else if(response == 401){
                    alertify.success("Login to continue");
                }
                else if(response == 500){
                    alertify.success("Something went wrong");
                }
            }
        });
    });


    $(document).on('click','.updateQuantity', function(){
        var quantity = $(this).closest('.product_data').find('.quantity-input').val();
        var product_id = $(this).closest('.product_data').find('.productId').val();
        
        $.ajax({
            method: "POST",
            url: "functions/cartFunction.php",
            data: {
                "product_id": product_id,
                "product_quantity": quantity,
                "scope": "update"
            },
            success: function(response){
                //alert(response);
            }
        });
    });

    $(document).on('click', '.deleteItem', function(){
        var cart_id = $(this).val();
        //alert(cart_id);

        $.ajax({
            method: "POST",
            url: "functions/cartFunction.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete"
            },
            success: function(response){
                if(response == 200){
                    alertify.success("Product deleted");
                    $('#myCart').load(location.href + " #myCart");
                }
                else{
                    alertify.success(response);
                }
            }
        });
    });
});