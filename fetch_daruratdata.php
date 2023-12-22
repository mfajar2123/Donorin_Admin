<?php

include 'config.php';

// Query untuk mendapatkan data darahdarurat
$query = "SELECT * FROM darahdarurat";
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