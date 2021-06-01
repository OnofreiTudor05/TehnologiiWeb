<?php

require_once "./response.php";
require_once "../models/CRUDRecord.php";
include_once "../models/ManagerConexiune.php";




function adaugaRecord($request)
{
    $model = new CRUDRecord();
    $payload = $request['payload'];
    $payload = json_encode($payload);    
    $response = $model->adaugaRecord($payload);
    if ($response) {
        Response::responseCode(200);
        Response::content(['response' => 'Record created successfully!']);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'invalid data']);
}


function stergeRecord($request)
{
    $model = new CRUDRecord();
    $id = $request['params']['eventid'];

    $args = array();
    $args['eventid'] = $id;
    $args = json_encode($args);
    $response = $model->stergeRecord($args);
    if ($response) {
        Response::responseCode(200);
        Response::content(['response' => 'Record deleted successfully!']);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'invalid attack id']);
}

