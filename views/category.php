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
      <div class="block-header">
        <h2>CATEGORY</h2>
        <!-- <div class="js-sweetalert">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <button class="btn btn-primary waves-effect" data-type="success">CLICK ME</button>
          </div>
        </div> -->
      </div>

      <!-- Exportable Table -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>List of Categories</h2>
              <a href="#" class="header-dropdown m-r-5" id="action-add" data-toggle="modal"
                data-target="#modal-category">
                <i class="material-icons">add</i>
              </a>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dt-category">
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
            <div class="form-group">
              <label class="form-label">Name</label>
              <div class="form-line">
                <input type="text" id="name" name="name" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="operation" id="operation">
            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            <input type="submit" class="btn btn-info waves-effect" name="submit" id="submit" value="Add">
          </div>
        </form>
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
        $('#submit').val("Add");
        $('#operation').val("Add");
      });

      var dataTable = $('#dt-category').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
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

        if (name != '') {
          $.ajax({
            url: "../app/controllers/category/create.php",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {
              swal("Success!", data, "success");
              $('#form-category')[0].reset();
              $('#modal-category').modal('hide');
              dataTable.ajax.reload();
            }
          });
        } else {
          alert("Fields are required");
        }
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
            $('#submit').val("Edit");
            $('#operation').val("Edit");
          }
        })
      });


      $(document).on('click', '.delete', function () {
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to delete this?")) {
          $.ajax({
            url: "../app/controllers/category/delete.php",
            method: "POST",
            data: {
              id: id
            },
            success: function (data) {
              alert(data);
              dataTable.ajax.reload();
            }
          });
        } else {
          return false;
        }
      });

    });
  </script>

</body>

</html>