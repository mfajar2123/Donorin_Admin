<?php
include 'config.php';

// Query untuk mendapatkan data rspmi
$query = "SELECT id, nama, alamat, deskripsi, foto FROM rspmi";
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