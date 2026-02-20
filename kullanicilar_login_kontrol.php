<?php
    $response = array();
	  if($_POST)
	{
        $kullanici_adi = $_POST['kullanici_adi'];
		$sifre= $_POST['sifre'];
        //DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE değişkenleri alınır.
        require_once __DIR__ . '/db_config.php';
        // Bağlantı oluşturuluyor.
        $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        // Bağlantı kontrolü yapılır.
        if (!$baglanti) 
		{
            die("Hatalı bağlantı : " . mysqli_connect_error());
        }
        
        $sqlsorgu = "SELECT * FROM Kullanicilar WHERE Kullanicilar.kullanici_adi='$kullanici_adi' and Kullanicilar.sifre='$sifre'";
        $result = mysqli_query($baglanti, $sqlsorgu);
        
        if (mysqli_num_rows($result) > 0) 
		{ 
            $row = mysqli_fetch_assoc($result);
            $response["kurum_id"] = $row["kurum_id"];
			$response["yetki_id"] = $row["yetki_id"];
            echo json_encode($response);
        }
		else
		{
			$response["kurum_id"] = "0";
			$response["yetki_id"] = "0";
            echo json_encode($response);		
		}
        //bağlantı koparılır.message
        mysqli_close($baglanti);
    } else 
	{
        $response["kurum_id"] = "0";
        $response["yetki_id"] = "0";
        echo json_encode($response);
	}
		
?>




