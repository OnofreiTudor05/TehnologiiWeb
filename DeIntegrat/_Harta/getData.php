<?php

$conn = new mysqli("localhost", "root", "", "globalterrorism");

$sql = "SELECT latitude, longitude, country_txt FROM terrorism WHERE country_txt = 'United States'";

$result = $conn->query($sql);

$rezultatDeTrimis = array();
$totalAtacuri = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr = array(
            'title' => $row['country_txt'],
            'latitude' => floatval($row['latitude']),
            'longitude' => floatval($row['longitude']),
            'color' => "#000000"
        );
        $rezultatDeTrimis[] = $arr;
    }
}

    
    
$conn->close();

return json_encode($rezultatDeTrimis);
?>