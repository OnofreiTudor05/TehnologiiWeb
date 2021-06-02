<?php
    
    include_once "../app/models/ManagerConexiune.php";
    include_once "../app/models/CRUDRecord.php";
    include_once "../app/models/admin.php";


    //console_log("Pararirarira");

    $payload = array();

    /*$payload["searchsummary"] = trim($_GET['searchsummary']);
    $payload["iyearin"] = trim($_GET['iyearin']);
    $payload["iyearsf"] = trim($_GET['iyearsf']);
    $payload["country_txt"] = trim($_GET['country_txt']);
    $payload["region_txt"] = trim($_GET['region_txt']);
    $payload["provstate"] = trim($_GET['provstate']);
    $payload["attacktype1_txt"] = trim($_GET['attacktype1_txt']);
    $payload["targtype1_txt"] = trim($_GET['targtype1_txt']);
    $payload["targsubtype1_txt"] = trim($_GET['targsubtype1_txt']);
    $payload["natlty1_txt"] = trim($_GET['natlty1_txt']);
    $payload["weaptype1_txt"] = trim($_GET['weaptype1_txt']);
    $payload["weapsubtype1_txt"] = trim($_GET['weapsubtype1_txt']);
    $payload["nkillin"] = trim($_GET['nkillin']);
    $payload["nkillsf"] = trim($_GET['nkillsf']);
    $payload["propextent_txt"] = trim($_GET['propextent_txt']);
    $payload["ransom"] = trim($_GET['ransom']);
    $payload["ransomamtin"] = trim($_GET['ransomamtin']);
    $payload["ransomamtsf"] = trim($_GET['ransomamtsf']);
    */

    $payload["searchsummary"]='rebels';
    $payload["iyearin"]=20;
    $payload["iyearsf"]=9000;
    $payload["country_txt"]='Mexico';
    

    $payload = json_encode($payload);
    $model = new CRUDRecord();
    echo $model->cautaRecord($payload);
?>
