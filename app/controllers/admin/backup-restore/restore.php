<?php 

  $database = 'sim';

  if ($_FILES["database-file"]["name"] != '') {
    $array = explode(".", $_FILES["database-file"]["name"]);
    $extension = end($array);

    if ($extension == 'sql') {
      $connect = mysqli_connect("localhost", "root", "", $database);
      $output = '';
      $count = 0;
      $file_data = file($_FILES["database-file"]["tmp_name"]);

      foreach ($file_data as $row) {

        $start_character = substr(trim($row), 0, 2);

        if ($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '') {
          $output = $output . $row;
          $end_character = substr(trim($row), -1, 1);

          if ($end_character == ';') {
            if (!mysqli_query($connect, $output)) {
              $count++;
            }
            $output = '';
          }
        }
      }
      echo "<script>alert('Database Successfully Imported!');
      location='../../../../views/admin/settings.php';
      </script>";

    } else {
      echo "<script>alert('Invalid File!');
      location='../../../../views/admin/settings.php';
      </script>";
    }
  } else {
    echo "<script>alert('Please Select SQL file!');
    location='../../../../views/admin/settings.php';
    </script>";
  }


?>