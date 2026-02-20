<?php
// array for JSON response
$response = array();
//DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE değişkenleri alınır.
require_once '/db_config.php';
// Bağlantı oluşturuluyor.
$baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
// Bağlanti kontrolü yapılır.
if (!$baglanti) {
    die("Hatalı bağlantı : " . mysqli_connect_error());
}
    
$sqlsorgu = "SELECT id,alan_adi,alan_adi_kisa,kurum_id FROM Alanlar";
$result = mysqli_query($baglanti, $sqlsorgu);

// result kontrolü yap
if (mysqli_num_rows($result) > 0) {
    $response["Alanlar"] = array();
    while ($row = mysqli_fetch_assoc($result)) {
        
        $Alanlar = array();
        $Alanlar["id"] = $row["id"];
        $Alanlar["alan_adi"] = $row["alan_adi"];
        $Alanlar["kurum_id"] = $row["kurum_id"];
        
        array_push($response["Alanlar"], $Alanlar);
    }
    $response["success"] = 1;
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No data found";
    echo json_encode($response);
}
//bağlantı koparılır.
mysqli_close($baglanti);
?>
