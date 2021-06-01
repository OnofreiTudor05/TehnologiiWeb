<?php
    
    include_once "../app/models/ManagerConexiune.php";
    include_once "../app/models/CRUDRecord.php";
    include_once "../app/models/admin.php";
    
    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }



    $model = new CRUDRecord();
    $payload = array();
    $payload["iyear"] = 2012;
    $payload["imonth"] = 0;
    
    $payload["eventid"] = 22;
    $payload["country_txt"] = "BombardieriaNoastraDraga";
    $payload["latitude"] = 69.420;
    $payload["longitude"] = 19.420;
    $payload["summary"] = "Un atac terorist a avut loc atunci cand cei 3 muschetari au realizat aceasta introducere in baza de date.";

    $payload = json_encode($payload);
    echo $model->updateRecord($payload);
    

    //console_log("Pararirarira");
    
    
   /* $payload = array();
    $payload["numeUtilizator"] = $_POST["numeUtilizator"];
    $payload["password"] = $_POST["password"];
    $payload = json_encode($payload);
    console_log($payload);
    $model = new Admin();
    $model->login($payload);
*/

?>