<?php
    
    include_once "../app/models/ManagerConexiune.php";
    include_once "../app/models/CRUDRecord.php";
    
    $model = new CRUDRecord();
    $payload = array();

    $payload["eventid"] = 22;
    $payload["country_txt"] = "Bombardieria";
    $payload["latitude"] = 69.420;
    $payload["longitude"] = 19.420;
    $payload["summary"] = "Un atac terorist a avut loc atunci cand cei 3 muschetari au realizat aceasta introducere in baza de date.";
    

    $payload = json_encode($payload);
    echo $model->adaugaRecord($payload);

?>