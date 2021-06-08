<?php

require_once "./response.php";
require_once "../models/CRUDRecord.php";
include_once "../models/ManagerConexiune.php";

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

function cautaRecord($request)
{
    $model = new CRUDRecord();
    $data = $request['query'];
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

function cautaDateArticol($request)
{
    $model = new CRUDRecord();
    $data = $request['query'];
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