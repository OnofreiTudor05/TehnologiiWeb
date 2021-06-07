<?php

require_once "./response.php";
require_once "../models/CRUDRecord.php";
require_once "../models/ManagerConexiune.php";

function cautaDateGrafic($request)
{
    $model = new CRUDRecord();
    $data = $request['query'];
    $data = json_encode($data);

    $response = array();
    $response['dateGrafic'] = $model->cautaDateGrafic($data);
    $data = json_decode($data, true);
    if (($data["selecteazagr"]  ?? null) == "") {
        $response['selecteazagr'] = "Pie";
    } else {
        $response['selecteazagr'] =  $data['selecteazagr'];
    }

    if (($data["tipdategrafic"]  ?? null) == "") {
        $response["tipdategrafic"] = "country_txt";
    } else {
        $response['tipdategrafic'] =  $data['tipdategrafic'];
    }
    if ($response) {
        Response::responseCode(200);
        Response::content($response);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'Invalid data.']);
}
