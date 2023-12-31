<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$db = "dhani";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel "login"
$query = "SELECT Nama, Jeniskelamin, Alamat, Email FROM login";
$result = $conn->query($query);

// Periksa apakah query berhasil dieksekusi
if (!$result) {
    die("Query gagal: " . $conn->error);
}

// Tampilkan data dalam bentuk tabel HTML
echo "<table border='1'>
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Email</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['Nama']}</td>
            <td>{$row['Jeniskelamin']}</td>
            <td>{$row['Alamat']}</td>
            <td>{$row['Email']}</td>
          </tr>";
}

echo "</table>";

// Tutup koneksi ke database
$conn->close();
?>
