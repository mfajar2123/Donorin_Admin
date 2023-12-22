<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Darah Darurat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
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
            <a class="navbar-brand " href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daftarDonor.php">Daftar Donor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Darah Darurat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rspmi.php">RSPMI</a>
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


    <div class="container mt-2">
        <div class="container-fluid py-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-6 fw-bold mb-4">Darah Darurat</h1>
                <button type="button" class="btn btn-success fw-bold" data-bs-toggle="modal"
                    data-bs-target="#addDataModal">
                    Add Data
                </button>

            </div>
            <!-- <table id="daruratTable" class="table table-striped table-bordered">
                <thead class=" table-dark" style="background-color: #1941b0;">
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-2">Nama</th>
                        <th class="col-2">Golongan Darah</th>
                        <th class="col-2">Deskripsi</th>
                        <th class="col-2">Status</th>

                    </tr>
                </thead>
            </table> -->
            <table id="daruratTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-2">Nama</th>
                        <th class="col-2">Golongan Darah</th>
                        <th class="col-2">Deskripsi</th>
                        <th class="col-1">Status</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- Add Data Modal -->
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Add Darah Darurat </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addDataForm">
                        <div class="mb-3">
                            <label for="namaSelect" class="form-label">Nama</label>
                            <select class="form-select" id="namaSelect">
                                <!-- Options will be populated dynamically -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="golDarahSelect" class="form-label">Golongan Darah</label>
                            <select class="form-select" id="golDarahSelect">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsiTextarea" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsiTextarea" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="./assets/js/darahDarurat.js"></script>
</body>

</html>