jQuery(document).ready(function ($) {
    $(".update-cart").click(function () {
        var el = this;
        var product_id = $(el).data('id');
        var route = $(el).data('url');
        var quantity_product = $("#quantity-" + product_id).val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            method: "PATCH",
            data: {
                'id': product_id,
                'qty': quantity_product,
            },
            success: function (response) {
              $("#subtotal-" + product_id).html(response.total + " " + "VNĐ");
              $("#sumtotal").html("Tổng tiền:" + response.sumtotal + " " + "VNĐ");

           }
        });
    });
    $(".remove-from-cart").click(function () {
        var el = this;
        var delete_id = $(el).data('id');
        var route = $(el).data('url');
        var result = confirm('Bạn có chắc chắn muốn xóa không?');
        if (result) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: route,
                method: 'post',
                data: {
                    'id': delete_id,
                    _method: 'delete',
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
    $("#add_cart").on('click', function() {
        var el = this;
        var quantity = $('#quantity').val();
        var product_id = $(el).data('id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/add-cart/' + product_id,
            method: "POST",
            data: {
                'id': product_id,
                'qty': quantity,
            },
            success(response) {
                window.location.reload();
            },
        });
    });

    $("#search").on('click', function() {
        var el = this;
        var category = $('#category').val();
        var madein = $('#madein').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/search_product/',
            method: "POST",
            data: {
                'category': category,
                'madein': madein,
            },
            success(response) {
            },
        });
    });
});
