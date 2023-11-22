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
   

    <div class="container py-4">
        <div class="container-fluid py-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-5 fw-bold mb-4">Darah Darurat</h1>
                <button type="button" class="btn btn-success fw-bold" data-bs-toggle="modal"
    data-bs-target="#addDataModal">
    Add Data
    </button>

                </div>
                <table id="daruratTable" class="table table-striped table-bordered">
                    <thead class=" table-dark" style="background-color: #1941b0;">
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-2">Nama</th>
                            <th class="col-2">Golongan Darah</th>
                            <th class="col-2">Deskripsi</th>                       
                            
                        </tr>
                    </thead>
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
    <script>
        $(document).ready(function() {
            $('#daruratTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: 'fetch_daruratdata.php',
                    type: 'POST'
                },
                "columns": [
                    {"data": "id"},
                    {"data": "nama"},
                    {"data": "gol_darah"},
                    {"data": "deskripsi"}
                    
                ]
            });
            $.ajax({
                url: 'fetch_rspmidata.php', // Replace with your endpoint to fetch rspmi data
                type: 'GET',
                dataType: 'json', 
                success: function(response) {
                    // Assuming response is an array of names
                    var tes = response.data; // Akses data terlebih dahulu
                    console.log(tes);
                    var names = tes.map(function(item) {
                        return item.nama; // Ambil nama dari setiap item di dalam data
                    });
                    console.log(names); // Cetak names
                    var selectOptions = '';
                    names.forEach(function(names) {
                        selectOptions += '<option value="' + names + '">' + names + '</option>';
                    });
                    $('#namaSelect').html(selectOptions);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

            // Submit form handling (add data)
                $('#addDataForm').submit(function(e) {
                e.preventDefault();
                // Handle form submission here, use AJAX to send data to server
                var nama = $('#namaSelect').val();
                var golDarah = $('#golDarahSelect').val();
                var deskripsi = $('#deskripsiTextarea').val();
                
                // Use AJAX to send form data to server
                $.ajax({
                    url: 'createDarahDarurat.php', // Replace with your endpoint to add data
                    type: 'POST',
                    data: {
                        nama: nama,
                        gol_darah: golDarah,
                        deskripsi: deskripsi
                    },
                    success: function(response) {
                        
                        // You can update table or show a success message
                        $('#addDataModal').modal('hide'); // Hide the modal
                        $("#daruratTable").DataTable().ajax.reload()

                        // Show success alert using SweetAlert2
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data has been created',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Handle error response (if any)
                    }
                });
            });
        });
      
      
    </script>
</body>
</html>
