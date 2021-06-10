<?php

require_once "./response.php";
require_once "../models/CRUDRecord.php";
require_once "../models/ManagerConexiune.php";
require_once "../models/admin.php";

// functie cu care adaugam un atac in baza de date
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

// functie cu care modificam un atac din baza de date folosind eventid-ul sau
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

// functie cu care stergem un atac din baza de date folosind eventid-ul sau
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

// functie pentru verificarea datelor de login ale adminului
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
