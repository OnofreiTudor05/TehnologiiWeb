<?php
require_once "./response.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

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
