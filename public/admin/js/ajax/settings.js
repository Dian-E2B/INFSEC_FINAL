$(document).ready(function () {

  var dataTable = $('#dt-blocked-users').DataTable({
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "order": [
      [0, 'desc']
    ],
    "ajax": {
      url: "../../app/controllers/admin/blocked-users/view.php",
      type: "POST"
    },
    "columnDefs": [{
      "targets": [3],
      "orderable": false,
      "className": "text-center",
    },

    ],

  });


  $(document).on('click', '.unblock', function () {
    var id = $(this).attr("id");

    $('#modal-unblock').modal('show');
    $("#btn-unblock").click(function () {
      $.ajax({
        url: "../../app/controllers/admin/blocked-users/unblock-user.php",
        method: "POST",
        data: {
          id: id
        },
        success: function (data) {
          $('#modal-unblock').modal('hide');
          swal("Success!", data, "success");
          dataTable.ajax.reload();
        }
      });
    });

  });



});