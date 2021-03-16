$(document).ready(function () {

  $('#action-add').click(function () {
    $('#form-product')[0].reset();
    $('#modal-title').text("New Product");
    $('#submit').val("ADD");
    $('#operation').val("Add");
  });

  //Products datatable
  var dataTable = $('#dt-products').DataTable({
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      url: "../../app/controllers/cashier/view.php",
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





});