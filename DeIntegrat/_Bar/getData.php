<?php

$conn = new mysqli("localhost", "root", "", "globalterrorism");

$sql = "SELECT country_txt, COUNT(*) AS " . "numarAtacuri" . " FROM terrorism GROUP BY country_txt ORDER BY numarAtacuri DESC";

$result = $conn->query($sql);

$rezultatDeTrimis = array();
$totalAtacuri = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalAtacuri += $row['numarAtacuri'];
        $arr = array(
            'numeTara' => $row['country_txt'],
            'numarAtacuri' => $row['numarAtacuri']
        );
        $rezultatDeTrimis[] = $arr;
    }

    $rezultateFinale = array();
    $atacuriOther = 0;
    
    foreach ($rezultatDeTrimis as $entry) {

        if ($entry['numarAtacuri'] * 100 > $totalAtacuri) {
            $rezultateFinale[] = array(
                'numeTara' => $entry['numeTara'],
                'numarAtacuri' => $entry['numarAtacuri']
            );
        } else {
            $atacuriOther += $entry['numarAtacuri'];
        }
    }
    $rezultateFinale[] = array(
        'numeTara' => 'Other',
        'numarAtacuri' => $atacuriOther
    );
}
$conn->close();

return json_encode($rezultateFinale);
