$(document).ready(function () {

  $('#action-add').click(function () {
    $('.form-supplier')[0].reset();
    $('#modal-title').text("New Supplier");
    $('#submit').val("ADD");
    $('#operation').val("Add");
  });

  var dataTable = $('#dt-suppliers').DataTable({
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "order": [
      [0, 'desc']
    ],
    "ajax": {
      url: "../../app/controllers/admin/suppliers/view.php",
      type: "POST"
    },
    "columnDefs": [{
      "targets": [4],
      "orderable": false,
      "className": "text-center",
    },

    ],

  });


  $(document).on('submit', '.form-supplier', function (event) {
    event.preventDefault();

    $.ajax({
      url: "../../app/controllers/admin/suppliers/create.php",
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

        $('.form-supplier')[0].reset();
        $('#modal-supplier').modal('hide');
        dataTable.ajax.reload();

      }
    });
  });



  $(document).on('click', '.update', function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "../../app/controllers/admin/suppliers/edit.php",
      method: "POST",
      data: {
        id: id
      },
      dataType: "json",
      success: function (data) {
        $('#modal-supplier').modal('show');
        $('#name').val(data.name);
        $('#address').val(data.address);
        $('#phone-number').val(data.phone_number);
        $('#modal-title').text("Edit Supplier");
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
        url: "../../app/controllers/admin/suppliers/delete.php",
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