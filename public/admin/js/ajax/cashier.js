$(document).ready(function () {

  //Products datatable
  var dataTable = $('#dt-products').DataTable({
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      url: "../../app/controllers/admin/cashier/view.php",
      type: "POST"
    },
    "columnDefs": [{
      "targets": [0, 5],
      "orderable": false,
      "className": "text-center",
    },],

  });


  //Cart datatable
  var dataTable = $('#dt-cart').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [
      [0, 'desc']
    ],
    "ajax": {
      url: "../../app/controllers/admin/cart/view.php",
      type: "POST"
    },
    drawCallback: function (settings) {
      $('#total_order').html(settings.json.cart_total);
    },
    "columnDefs": [{
      "targets": [4],
      "orderable": false,
      "className": "text-center",
    },],

  });



  $(document).on('submit', '#form-products', function (event) {
    event.preventDefault();
    // var name = $('#name').val();

    $.ajax({
      url: "../../app/controllers/admin/cashier/create.php",
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        if (data && data != "" && data != "add product") {
          $("#error-message").show();
          $('#error-message').text(data);

        } else {

          $('#form-products')[0].reset();
          $('#modal-products').modal('hide');
          dataTable.ajax.reload();

          if (data == 'add product') {
            swal("Success!", 'Product has been successfully added to cart.', "success");

          }

        }

      }
    });
  });


  $(document).on('click', '.update', function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "../../app/controllers/admin/cashier/edit.php",
      method: "POST",
      data: {
        id: id
      },
      dataType: "json",
      success: function (data) {
        $('#modal-products').modal('show');
        $('#id').val(id);
        $('#submit').val("ADD");
        $('#operation').val("Edit");

      }
    })
  });





});