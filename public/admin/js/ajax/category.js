$(document).ready(function () {

  $('#action-add').click(function () {
    $('#form-category')[0].reset();
    $('#modal-title').text("New Category");
    $('#submit').val("ADD");
    $('#operation').val("Add");
  });

  var dataTable = $('#dt-category').DataTable({
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "order": [
      [0, 'desc']
    ],
    "ajax": {
      url: "../../app/controllers/admin/category/view.php",
      type: "POST"
    },
    "columnDefs": [{
      "targets": [2],
      "orderable": false,
      "className": "text-center",
    },

    ],

  });


  $(document).on('submit', '#form-category', function (event) {
    event.preventDefault();
    // var name = $('#name').val();

    $.ajax({
      url: "../../app/controllers/admin/category/create.php",
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        if (data && data != "" && data != "add" && data != "edit") {
          $("#error-message").show();
          $('#error-message').text(data);

        } else {
          var message = '';
          if (data == 'add') {
            message = 'Data has been saved successfully.';
          } else if (data == 'edit') {
            message = 'Data has been updated successfully.';
          }

          $('#form-category')[0].reset();
          $('#modal-category').modal('hide');
          dataTable.ajax.reload();

          swal("Success!", message, "success");

        }

      }
    });
  });



  $(document).on('click', '.update', function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "../../app/controllers/admin/category/edit.php",
      method: "POST",
      data: {
        id: id
      },
      dataType: "json",
      success: function (data) {
        $('#modal-category').modal('show');
        $('#name').val(data.name);
        $('#modal-title').text("Edit Category");
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
        url: "../../app/controllers/admin/category/delete.php",
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



  $("#modal-category").on("hidden.bs.modal", function () {
    $("#error-message").hide();

  });

});