$(document).ready(function () {
    $('.delete').click(function () {
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
                    if (response === true) {
                        $(el).closest('tr').css('background', 'red');
                        $(el).closest('tr').fadeOut(800, function () {
                            $(el).remove();
                            alert( 'Xóa thành công');
                        });
                    } else {
                        alert( 'Xóa không thành công');
                    }
                }
            });
        }
    });
    var table = $('#datatable').DataTable();

    //edit
    table.on('click', '.editcategory', function () {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();

        $('#name').val(data[1]);
        $('#description').val(data[2]);
        $('#parent').val(data[3]);

        $('#editForm').attr('action', '/category/' + data[0]);
        $('#editModal').modal('show');
    });

    $('.edit_properties').click(function(){
        var el = this;
        var edit_id = $(el).data('id');
        var route = $(el).data('url');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
            method: 'get',
            data: {
                'id': edit_id,
                'addNew' : true,
                _method: 'get',
            },
            success: function(response) {
                if(response.length > 0) {

                    var round_data = ''

                    response.map((data, index) => {
                        let data_arr = Object.entries(data)
                        round_data += '<div class="row">' +
                                        '<div class="col-md-2">' +
                                            '<input type="text" name="properties['+ index +'][key]" class="form-control" value="'+ data_arr[0][0] +'">'+
                                        '</div>'+
                                        '<div class="col-md-4">'+
                                            '<input type="text" name="properties['+ index +'][value]" class="form-contro" value="'+ data_arr[0][1] +'">'+
                                        '</div>'+
                                    '</div>'
                    })
                    // Get the <ul> element with id="myList"
                    var list = document.getElementById("round");

                    // As long as <ul> has a child node, remove it
                    while (list.hasChildNodes()) {
                        list.removeChild(list.firstChild);
                    }
                    $('#round').append(round_data)

                }
            }
        });
    });
});

