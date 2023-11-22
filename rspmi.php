<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DataTables with Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .btn-action {
            cursor: pointer;
        }
        .rspmi-img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0a0a0b;">
        <div class="container-fluid">
          <a  class="navbar-brand " href="#">Admin Panel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a  class="nav-link" href="#" >Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="users.php" >Users</a>
              </li>
              <li class="nav-item">
                <a  class="nav-link" href="daftarDonor.php">Daftar Donor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="darahDarurat.php" >Darah Darurat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">RSPMI</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Role</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Privilege</a>
              </li> -->
            </ul>
            <span class="navbar-text">
              Welcome to Donorin
            </span>
          </div>
        </div>
      </nav>
    <div class="container mt-4">
        <table id="rspmiTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#rspmiTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: 'fetch_rspmidata.php',
                    type: 'POST'
                },
                "columns": [
                    {"data": "id"},
                    {"data": "nama"},
                    {"data": "alamat"},
                    {"data": "deskripsi"},
                    {
                        "data": "foto",
                        "render": function (data) {
                            return '<img src="' + data + '" class="rspmi-img" alt="RSPMI Image">';
                        }
                    },
                    
                ]
            });
        });
    </script>
</body>
</html>
