<?php
include 'config.php';

// Query untuk mendapatkan data users
$query = "SELECT id, username,password , nama, poin FROM users";
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
