<?php

$conn = new mysqli("localhost", "root", "", "globalterrorism");

$sql = "SELECT iyear, COUNT(*) AS numarAtacuri FROM terrorism GROUP BY iyear ORDER BY iyear";

$result = $conn->query($sql);

$rezultatDeTrimis = array();
$totalAtacuri = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalAtacuri += $row['numarAtacuri'];
        if ($row['iyear'] > 0) {
            $arr = array(
                'an' => $row['iyear'],
                'numarAtacuri' => $row['numarAtacuri']
            );
            $rezultatDeTrimis[] = $arr;
        }
    }
}
$conn->close();

return json_encode($rezultatDeTrimis);
