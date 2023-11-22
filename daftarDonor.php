<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Donor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Pastikan Anda menyertakan referensi ke SweetAlert2 CSS dan JS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet">


    <style>
        /* Custom CSS */
        .btn-action {
            cursor: pointer;
        }
        .btn-accept,
.btn-reject {
    padding: 5px 15px;
    font-size: 14px;
    border: 1px solid transparent;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.btn-accept {
    background-color: #28a745;
    color: #fff;
}

.btn-reject {
    background-color: #dc3545;
    color: #fff;
}

.btn-accept:hover,
.btn-reject:hover {
    filter: brightness(90%);
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
                <a  class="nav-link active" aria-current="page" href="#">Daftar Donor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="darahDarurat.php">Darah Darurat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="rspmi.php">RSPMI</a>
              </li>
              
            </ul>
            <span class="navbar-text">
              Welcome to Donorin
            </span>
          </div>
        </div>
      </nav>

    
    <!-- <div class="container py-4">
        <div class="container-fluid py-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-5 fw-bold mb-4">Daftar Donor</h1> -->
                <!-- <button type="button" class="btn btn-success fw-bold" data-bs-toggle="modal"
    data-bs-target="#addDataModal">
    Add Data
    </button> -->
    <div class="container mt-4">
        <table id="donorTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Darah</th>
                    <th>Alamat</th>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>


                <!-- </div>
                <table id="donorTable" class="table table-striped table-bordered">
                    <thead class=" table-dark" style="background-color: #1941b0;">
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-2">NIK</th>
                            <th class="col-2">Nama</th>
                            <th class="col-2">Darah</th> 
                            <th class="col-1">Alamat</th>
                            <th class="col-2">No</th>
                            <th class="col-2">Lokasi</th>
                            <th class="col-2">Jadwal</th> 
                            <th class="col-1">Status</th>
                            <th class="col-1">Action</th>
                                                 
                            
                        </tr>
                    </thead>
                </table>
            </div>
        </div> -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="./assets/js/daftarDonor.js"></script>
   
    
</body>
</html>
