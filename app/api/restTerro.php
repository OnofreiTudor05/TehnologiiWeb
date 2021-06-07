<?php
require_once "./response.php";
require_once "./admin.php";
require_once "./filters.php";
require_once "./chart.php";
require_once "./map.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$apiRoutes =  [
    [
        "method" => "DELETE",
        "route" => "attack/:eventid",
        "permissions" => "loginCheckOut",
        "function" => "stergeRecord"
    ],
    [
        "method" => "POST",
        "route" => "attack",
        "permissions" => "loginCheckOut",
        "function" => "adaugaRecord"
    ],
    [
        "method" => "PUT",
        "route" => "attack/:eventid",
        "permissions" => "loginCheckOut",
        "function" => "updateRecord"
    ],
    [
        "method" => "GET",
        "route" => "attack/:eventid",
        "function" => "cautaDupaId"
    ],
    [
        "method" => "GET",
        "route" => "attack",
        "function" => "cautaRecord"
    ],
    [
        "method" => "POST",
        "route" => "login",
        "function" => "login"
    ],
    [
        "method" => "GET",
        "route" => "chart",
        "function" => "cautaDateGrafic"
    ],
    [
        "method" => "GET",
        "route" => "map",
        "function" => "cautaDateMap"
    ]
];


$GLOBALS['goodRouteBadMethod'] = 0;

foreach ($apiRoutes as $route) {

    if (doRequest($route)) {
        exit;
    }
}
if ($GLOBALS['goodRouteBadMethod'] === 1) {
    Response::responseCode(405);
    Response::content(['response' => 'method not allowed']);
    exit;
}

Response::responseCode(404);
Response::content(['response' => 'invalid url']);

function doRequest($route)
{
    $url = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    $currentRoute = explode("api/", $url)[1];
    $currentRoute = explode("?", $currentRoute)[0];
    $wantedRoute = explode("/", $route['route']);
    if (explode("/", $currentRoute)[0] !== $wantedRoute[0]) {
        return false;
    }
    if ($method !== $route['method']) {
        $GLOBALS['goodRouteBadMethod'] = 1;
        return false;
    }

    $GLOBALS['goodRouteBadMethod'] = 0;

    if ($currentRoute !== "") {
        $params = [];
        $query = [];
        $parts = explode('/', $route['route']);
        $routeParts = explode("/", $currentRoute);

        if (isset($parts[1])) {
            if (isset($routeParts[1])) {
                if ($parts[1][0] === ':') {
                    $params[substr($parts[1], 1)] = $routeParts[1];
                }
            } else {
                return false;
            }
        }

        if (strpos($url, '?')) {
            $queryAll = explode('?', $url)[1];
            $queryArgs = explode('&', $queryAll);

            foreach ($queryArgs as $arg) {
                if (strpos($arg, '=')) {
                    $query[explode('=', $arg)[0]] = explode('=', $arg)[1];
                }
            }
        }

        $data = file_get_contents('php://input');
        if (strlen($data)) {

            $data = json_decode($data, true);
        } else {
            $data = NULL;
        }

        if (isset($route['permissions'])) {
            $check = call_user_func($route['permissions'], [
                "params" => $params,
                "query" => $query,
                "data" => $data
            ]);
            if (!$check) {
                exit;
            }
        }
        call_user_func($route['function'], [
            "params" => $params,
            "query" => $query,
            "data" => $data
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
