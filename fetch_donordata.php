<?php
include 'config.php';

// Query untuk mendapatkan data daftardonor
$query = "SELECT id, nik, nama, darah, alamat, no, lokasi, jadwal, status FROM daftardonor";
$result = $conn->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Format data menjadi JSON
echo json_encode(array("data" => $data));

// Tutup koneksi
$conn->close();
?>
