<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <?php


  include('config/config.php');

  ?>
</head>

<body onload="checkCookies('ids')">

  <nav class="navbar bg-secondary">
    <div class="container-fluid">
      <a class="navbar-brand fs-4 text-light fw-semibold">My Driver</a>
      <form class="d-flex justify-content-around " role="search">
        <button class="btn btn-danger mx-2" type="button" data-bs-toggle="modal" data-bs-target="#DeleteModal">Delete</button>
        <button class="btn btn-light  mx-2" type="button" id="toggleredit" data-bs-toggle="modal" data-bs-target="#RenameModal" onclick="ViewFolder()">Rename</button>
        <button class="btn btn-light  mx-2" type="button" data-bs-toggle="modal" data-bs-target="#NewFolderModal">New Folder</button>
      </form>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="nav-link active fs-5 text-decoration-underline text-primary" aria-current="page" href="#">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>

  <div class="d-flex flex-column align-items-center justify-content-center  my-2">

    <div class=" d-flex  mb-3 w-75 border-rounded">

      <input class="form-control mx-0" type="file" id="formFile"><button class="mx-0 btn btn-primary mx-2" type="submit" onclick="UploadFolder()">upload</button>
    </div>



    <?php
    $qry = $db->prepare('SELECT id , names , sizes , modifytime  FROM drivers');
    $qry->execute();
    $data = $qry->fetchAll(PDO::FETCH_OBJ);


    $table = ' <table class="table  w-75">
      <thead>
        <tr>
          <th scope="col">
            <div class="form-check ">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Name
              </label>
            </div>
          </th>
          <th scope="col">Last modify</th>
          <th scope="col">Size</th>
        </tr>
      </thead><tbody>';

    foreach ($data as $record) {
      $table .= '<tr> <th scope="row "> 
        <input class="form-check-input" type="checkbox" name="checked" id="' . $record->id . '">
        <label class="form-check-label text-primary text-decoration-underline" for="flexCheckDefault">' . $record->names
        . '
        </label></th><td>' . $record->modifytime . '</td><td>' . humanFileSize($record->sizes, 'MB') . '</td></tr>';
    }
    $table .= '
    </tbody>
    </table>';

    echo $table;


    ?>






  </div>
  <!-- new folder modal -->
  <div class="modal fade" id="NewFolderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New <i class="fas fa-folder    "></i> files</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="text" placeholder="New folder name" aria-label="default input example">
        </div>
        <div class="modal-footer">
          <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Create </button>
        </div>
      </div>
    </div>
  </div>




  <!-- delete modal -->
  <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Deleting files</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure about deleting the selected files ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="DeleteFile()">Delete </button>
        </div>
      </div>
    </div>
  </div>



  <!-- renmae modal -->
  <div class="modal fade" id="RenameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Rename Files</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class=" d-flex  mb-3 w-75 border-rounded">
            <?php if (isset($_COOKIE['names'])) {

              echo '<input type="text" name="editor"  id="' . $_COOKIE['ids'] . '"  value="' . $_COOKIE['names'] . '">';
            }
            ?>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="EditFolder()">Rename </button>
        </div>
      </div>
    </div>
  </div>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script type="text/javascript" src="\asset\js\UploadFolder.js"></script>
  <script type="text/javascript" src="\asset\js\DeleteFile.js"></script>
  <script type="text/javascript" src="\asset\js\EditFolder.js"></script>
  <script type="text/javascript" src="\asset\js\checkCookies.js"></script>
  <script type="text/javascript" src="\asset\js\ViewFolder.js"></script>


</body>

</html>

<?php
function humanFileSize($size, $unit = "")
{
  if ((!$unit && $size >= 1 << 30) || $unit == "GB")
    return number_format($size / (1 << 30), 2) . "GB";
  if ((!$unit && $size >= 1 << 20) || $unit == "MB")
    return number_format($size / (1 << 20), 2) . "MB";
  if ((!$unit && $size >= 1 << 10) || $unit == "KB")
    return number_format($size / (1 << 10), 2) . "KB";
  return number_format($size) . " bytes";
}




?>