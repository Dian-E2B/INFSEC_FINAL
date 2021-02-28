$(document).ready(function () {

  $('#action-add').click(function () {
    $('#form-product')[0].reset();
    $('#modal-title').text("New Product");
    $('#submit').val("ADD");
    $('#operation').val("Add");
  });


  var dataTable = $('#dt-products').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
     url: "../../app/controllers/products/view.php",
     type: "POST"
    },
    "columnDefs": [{
      "targets": [0, 7],
      "orderable": false,
      "className": "text-center",
    }, ],

  });


  $(document).on('submit', '#form-product', function (event) {
    event.preventDefault();

    $.ajax({
      url: "../../app/controllers/products/create.php",
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {

        var message = '';
        if (data == 'add') {
          message = 'Data has been saved successfully.';
        }

        if (data == 'edit') {
          message = 'Data has been updated successfully.';
        }

        if (data == 'Something went wrong.') {
          swal("Error!", data, "error");

        } else {
          swal("Success!", message, "success");

        }

        $('#form-product')[0].reset();
        $('#modal-product').modal('hide');
        dataTable.ajax.reload();

      }
    });
  });



  $(document).on('click', '.update', function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "../../app/controllers/products/edit.php",
      method: "POST",
      data: {
        id: id
      },
      dataType: "json",
      success: function (data) {
        $('#modal-product').modal('show');
        $('#name').val(data.name);
        // $('#address').val(data.address);
        // $('#phone-number').val(data.phone_number);
        $('#modal-title').text("Edit Product");
        $('#id').val(id);
        $('#submit').val("SAVE CHANGES");
        $('#operation').val("Edit");

      }
    })
  });



  $(document).on('click', '.delete', function () {
    var id = $(this).attr("id");

    $('#modal-delete').modal('show');
    $("#btn-delete").click(function () {
      $.ajax({
        url: "../../app/controllers/products/delete.php",
        method: "POST",
        data: {
          id: id
        },
        success: function (data) {
          $('#modal-delete').modal('hide');
          swal("Success!", data, "success");
          dataTable.ajax.reload();
        }
      });
    });

  });


});