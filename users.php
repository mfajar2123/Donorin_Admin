<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
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
                        <a class="nav-link active" aria-current="page" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daftarDonor.php">Daftar Donor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="darahDarurat.php">Darah Darurat</a>
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

    <div class="container mt-4">
        <table id="userTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Poin</th>

                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/users.js"></script>
</body>

</html>