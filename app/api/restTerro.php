<?php
require_once "./response.php";
require_once "./admin.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$apiRoutes =  [
    [
        "method" => "DELETE",
        "route" => "deleteattack/:eventid",
        "permissions" => "loginCheckOut",
        "function" => "stergeRecord"
    ],
    [
        "method" => "POST",
        "route" => "insertattack",
        "permissions" => "loginCheckOut",
        "function" => "adaugaRecord"
    ]
];

foreach ($apiRoutes as $route) {

    if (doRequest($route)) {
        exit;
    }
}
//exista path dar nu metoda => 405 method not allowed, else 404
Response::responseCode(404);
Response::content(['response' => 'invalid url']);

function doRequest($route)
{
    $url = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method !== $route['method']) {
        return false;
    }

    $currentRoute = explode("api/", $url)[1];

    if ($currentRoute !== "") {
        $params = [];
        $query = [];
        $parts = explode('/', $route['route']);
        $routeParts = explode("/", $currentRoute);

        // Params
        $index = 1;
        foreach ($parts as $p) {
            if ($p[0] === ':') {
                $params[substr($p, 1)] = $routeParts[$index];
                $index++;
            }
        }
        // Query
        if (strpos($url, '?')) {
            $queryString = explode('?', $url)[1];
            $queryParts = explode('&', $queryString);

            foreach ($queryParts as $part) {
                if (strpos($part, '=')) {
                    $query[explode('=', $part)[0]] = explode('=', $part)[1];
                }
            }
        }

        // Payload
        $payload = file_get_contents('php://input');
        if (strlen($payload)) {

            $payload = json_decode($payload, true);
        } else {
            $payload = NULL;
        }

        if (isset($route['permissions'])) {
            $didPass = call_user_func($route['permissions'], [
                "params" => $params,
                "query" => $query,
                "payload" => $payload
            ]);
            if (!$didPass) {
                exit();
            }
        }
        call_user_func($route['function'], [
            "params" => $params,
            "query" => $query,
            "payload" => $payload
        ]);

        return true;
    }

    return false;
}

function loginCheckOut()
{
    if (isset($_COOKIE['adminAntiTero']) && $_COOKIE['adminAntiTero'] === "a504b29fa631ec2dcd149a617107850c96485c8f96741cabbd47c074f43a245b") {
        return true;
    }
    Response::responseCode(401);
    Response::content([
        "status" => 401,
        "message" => "You must be logged in to perform this request!"
    ]);
    return false;
}
