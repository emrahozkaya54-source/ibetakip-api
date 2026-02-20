<?php

	$response = array();
	if($_POST)
	{
        //DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE değişkenleri alınır.
        require_once __DIR__ . '/db_config.php';
        // Bağlantı oluşturuluyor.
        $baglanti = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        // Bağlantı kontrolü yapılır.
        if (!$baglanti) 
		{
            die("Hatalı bağlantı : " . mysqli_connect_error());
        }
        
        $sqlsorgu = "SELECT id,alan_adi,alan_adi_kisa,kurum_id FROM Alanlar";
        $result = mysqli_query($baglanti, $sqlsorgu);
        
        if (mysqli_num_rows($result)>0) 
		{ 
            $response["alanlar"] = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $alanlar = array();
                $alanlar["id"] = $row["id"];
                $alanlar["alan_adi"] = $row["alan_adi"];
                $alanlar["alan_adi_kisa"] = $row["alan_adi_kisa"];
				$alanlar["kurum_id"] = $row["kurum_id"];
                array_push($response["alanlar"], $alanlar);
            }
            $response["success"] = 1;
            echo json_encode($response);
        }
        //bağlantı koparılır.message
        mysqli_close($baglanti);
	} 
?>




