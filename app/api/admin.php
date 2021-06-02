<?php

require_once "./response.php";
require_once "../models/CRUDRecord.php";
include_once "../models/ManagerConexiune.php";




function adaugaRecord($request)
{
    $model = new CRUDRecord();
    $data = $request['data'];
    $data = json_encode($data);    
    $response = $model->adaugaRecord($data);
    if ($response) {
        Response::responseCode(200);
        Response::content(['response' => 'Record created successfully!']);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'invalid data']);
}

function updateRecord($request)
{
    $model = new CRUDRecord();
    $data = $request['data'];
    $id = $request['params']['eventid'];
    $data['eventid'] = $id;
    $data = json_encode($data);    

    $response = $model->updateRecord($data);
    if ($response) {
        Response::responseCode(200);
        Response::content(['response' => 'Record updated successfully!']);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'invalid data']);
}


function stergeRecord($request)
{
    $model = new CRUDRecord();
    $id = $request['params']['eventid'];

    $data = array();
    $data['eventid'] = $id;
    $data = json_encode($data);
    $response = $model->stergeRecord($data);
    if ($response) {
        Response::responseCode(200);
        Response::content(['response' => 'Record deleted successfully!']);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'invalid attack id']);
}

