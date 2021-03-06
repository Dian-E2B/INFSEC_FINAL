$(document).ready(function () {

  $('#action-add').click(function () {
    $('#form_validation')[0].reset();
    $('#modal-title').text("New Product");
    $('#submit').val("ADD");
    $('#operation').val("Add");
  });


  var dataTable = $('#dt-products').DataTable({
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      url: "../../app/controllers/admin/products/view.php",
      type: "POST"
    },
    "columnDefs": [{
      "targets": [0, 7],
      "orderable": false,
      "className": "text-center",
    },],

  });


  $(document).on('submit', '#form_validation', function (event) {
    event.preventDefault();

    var extension = $('#image').val().split('.').pop().toLowerCase();
    if (extension != '') {
      if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'webp']) == -1) {
        alert("Invalid Image File");
        $('#image').val('');
        return false;
      }
    }

    $.ajax({
      url: "../../app/controllers/admin/products/create.php",
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

        $('#form_validation')[0].reset();
        $('#modal-product').modal('hide');
        dataTable.ajax.reload();

      }
    });
  });



  $(document).on('click', '.update', function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "../../app/controllers/admin/products/edit.php",
      method: "POST",
      data: {
        id: id
      },
      dataType: "json",
      success: function (data) {
        $('#modal-product').modal('show');
        $('#name').val(data.name);
        $('#description').val(data.description);
        $('#price').val(data.price);
        $('#quantity').val(data.quantity);
        $('#category').val(data.category).change();
        $('#supplier').val(data.supplier).change();

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
        url: "../../app/controllers/admin/products/delete.php",
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