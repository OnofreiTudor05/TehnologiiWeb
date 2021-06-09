<?php

require_once "./response.php";
require_once "../models/CRUDRecord.php";
require_once "../models/ManagerConexiune.php";

function cautaDateMap($request)
{
    $model = new CRUDRecord();
    $data = $request['query'];
    $data = json_encode($data);

    $response = $model->cautaDateMap($data);

    if ($response) {
        Response::responseCode(200);
        Response::content($response);
        exit;
    }

    Response::responseCode(400);
    Response::content(['response' => 'Invalid data.']);
}
