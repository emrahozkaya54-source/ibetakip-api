<?php
$host = "localhost"; // veya hostingin verdiği DB sunucu adresi
$dbname = "VERITABANI_ADI";
$username = "KULLANICI_ADI";
$password = "PAROLA";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

echo "Veritabanı bağlantısı başarılı!";
?>