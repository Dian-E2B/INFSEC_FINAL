<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | Category</title>

  <!-- links -->
  <?php include '../public/admin/sections/links.php'; ?>

</head>

<body class="theme-teal">
  <!-- Page Loader -->
  <?php include '../public/admin/sections/page-loader.php'; ?>

  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>

  <!-- Top Bar -->
  <?php include '../public/admin/sections/top-bar.php'; ?>

  <!-- Left Side Bar -->
  <?php include '../public/admin/sections/left-sidebar/leftsidebar.php'; ?>

  <section class="content">
    <div class="container-fluid">
      <!-- Category Datatable -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Category</h2>
              <a href="#" class="header-dropdown m-r-5" id="action-add" data-toggle="modal"
                data-target="#modal-category">
                <i class="material-icons">add</i>
              </a>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dt-category">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="modal-category" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form method="post" id="form-category">
          <div class="modal-header">
            <h4 class="modal-title" id="modal-title">New Category</h4>
          </div>
          <div class="modal-body">
            <label for="name">Name</label>
            <div class="form-group">
              <div class="form-line" id="field-name">
                <input type="text" id="name" name="name" class="form-control" placeholder="Category Name">
              </div>
              <label class="error" id="error-message"></label>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="operation" id="operation">
            <input type="button" class="btn btn-link waves-effect" data-dismiss="modal" value="CLOSE">
            <input type="submit" class="btn btn-info waves-effect" name="submit" id="submit" value="ADD">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you sure?</h4>
        </div>
        <div class="modal-body">
          <p>Once deleted, you will not be able to recover this category.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
          <button type="button" id="btn-delete" class="btn btn-danger waves-effect">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <?php include '../public/admin/sections/scripts.php'; ?>

  <script>
    $(document).ready(function () {

      $('#action-add').click(function () {
        $('#form-category')[0].reset();
        $('#modal-title').text("New Category");
        $('#submit').val("ADD");
        $('#operation').val("Add");
      });

      var dataTable = $('#dt-category').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [
          [0, 'desc']
        ],
        "ajax": {
          url: "../app/controllers/category/view.php",
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
        var name = $('#name').val();

        $.ajax({
          url: "../app/controllers/category/create.php",
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
          url: "../app/controllers/category/edit.php",
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
            url: "../app/controllers/category/delete.php",
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
  </script>

</body>

</html>