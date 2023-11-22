<?php
$servername = "34.128.101.207";
$username = "root";
$password = "zDEqSAF-8<vMva-(";
$dbname = "donorin"; // Ganti dengan nama database yang sesuai

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
