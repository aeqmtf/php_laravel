$(function() {

    var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
        keyboard: false
      });

    $("#table").on("click",".delete", function(){
        var id = $(this).attr('data-id');
        $('#f_delete').attr('action', '/ims/products/' + id + '/delete');
        myModal.toggle();
    });

    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: products_data_url,
        "order": [[ 0, "desc" ]],
        "autoWidth": true,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name'},
            { data: 'price', name:'price'},
            { data: 'stock', name:'stock'},
            { data: 'product_category_id', name:'product_category_id'},
            { data: 'updated_at', name:'updated_at'},
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });

    table.on( 'draw', function () {
        feather.replace();
    } );
});