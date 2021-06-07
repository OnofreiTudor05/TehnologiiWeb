<?php

    $conn = new mysqli("localhost", "root", "", "globalterrorism");

    $sql = "SELECT country_txt, COUNT(*) AS " . "numarAtacuri" . " FROM terrorism GROUP BY country_txt ORDER BY numarAtacuri DESC LIMIT 40";

    $result = $conn->query($sql);
    
    $rezultatDeTrimis = array();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $arr = array(
                'numeTara' => $row['country_txt'],
                'numarAtacuri' => $row['numarAtacuri']
            );
            $rezultatDeTrimis[] = $arr;
        }
    }
    $conn->close();

    return json_encode($rezultatDeTrimis);
?>