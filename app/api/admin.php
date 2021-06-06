<?php

require_once "./response.php";
require_once "../models/CRUDRecord.php";
require_once "../models/ManagerConexiune.php";
require_once "../models/admin.php";

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

function login($request)
{
    $model = new Admin();
    $data = $request['data'];
    $data = json_encode($data);

    $response = $model->login($data);
    if ($response) {
        Response::responseCode(200);
        Response::content(['response' => 'Login successfully!']);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'Invalid login']);
}
