<?php
$response = array();

if (isset($_POST['alan_adi']) && isset($_POST['alan_adi_kisa'])&& isset($_POST['kurum_id'])) 
{
    $alan_adi = $_POST['alan_adi'];
    $alan_adi_kisa = $_POST['alan_adi_kisa'];
	$kurum_id = $_POST['kurum_id'];
    //DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE değişkenleri alınır.
    require_once __DIR__ . '/db_config.php';
    // Bağlantı oluşturuluyor.
    $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    
    // Bağlanti kontrolü yapılır.
    if (!$baglanti) 
	{
        die("Hatalı bağlantı : " . mysqli_connect_error());
    }
    $sqlsorgu = "UPDATE Alanlar SET Alanlar.alan_adi = '$alan_adi',Alanlar.alan_adi_kisa = '$alan_adi_kisa' WHERE Alanlar.kurum_id = $kurum_id";
    if (mysqli_query($baglanti, $sqlsorgu)) 
	{
        $response["success"] = "true";
        $response["message"] = "successfully ";
        echo json_encode($response);
    } else 
	{
        $response["success"] = "false";
        $response["message"] = "No product found";
        echo json_encode($response);
    }
    //bağlantı koparılır.
    mysqli_close($baglanti);
} 
else 
{
    $response["success"] = "false";
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}
?>



