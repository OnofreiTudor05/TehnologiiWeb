<?php

require_once "./response.php";
require_once "../models/CRUDRecord.php";
include_once "../models/ManagerConexiune.php";

// functie care cauta un singur atac dupa eventid-ul sau
function cautaDupaId($request)
{
    $model = new CRUDRecord();
    $data = array();
    $data["eventid"] = $request['params']['eventid'];
    $data = json_encode($data);

    $response = $model->cautaDupaId($data);
    if ($response) {
        Response::responseCode(200);
        Response::content($response);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'no results']);
}

// functie care cauta toate atacurile selectate
function cautaRecord($request)
{
    $model = new CRUDRecord();
    $data = $request['query'];
    foreach ($data as &$string) {
        $string = urldecode($string);
    }
    $data = json_encode($data);
    $response = $model->cautaRecord($data);
    if ($response) {
        Response::responseCode(200);
        Response::content($response);
        exit;
    }
    Response::responseCode(400);
    Response::content(['response' => 'no results']);
}

// functie care cauta datele pentru generarea unui articol
function cautaDateArticol($request)
{
    $model = new CRUDRecord();
    $data = $request['query'];
    foreach ($data as &$string) {
        $string = urldecode($string);
    }
    $data = json_encode($data);
    $response = $model->cautaDateArticol($data);
    if ($response) {
        Response::responseCode(200);
        Response::content($response);
        exit;
    }
    Response::responseCode(400);
    Response::content(['response' => 'no results']);
}