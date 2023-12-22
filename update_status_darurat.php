<?php
$server = "34.128.101.207";
$username = "root";
$password = "zDEqSAF-8<vMva-(";
$database = "donorin";

// Koneksi ke database
$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        // Ubah status menjadi 'Selesai' dan tambahkan 100 poin pada user terkait
        $updateStatusQuery = "UPDATE darahdarurat SET status = 'Selesai' WHERE id = $id";
        // $addPointsQuery = "UPDATE users SET poin = poin + 100 WHERE nama = 
        //     (SELECT nama FROM daftardonor WHERE id = $id)";

        if ($conn->query($updateStatusQuery) === TRUE ) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    } elseif ($action == 'reject') {
        // Ubah status menjadi 'Gagal'
        $updateStatusQuery = "UPDATE darahdarurat SET status = 'Gagal' WHERE id = $id";

        if ($conn->query($updateStatusQuery) === TRUE) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
}

// Tutup koneksi
$conn->close();
?>