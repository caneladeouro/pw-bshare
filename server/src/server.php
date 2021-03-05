<?php

namespace BSHARE\WEBSERVER;

require __DIR__ . "/autoload.php";
require __DIR__ . "/Database" . "/ConnectionDatabase.php";
require __DIR__ . "/headers.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];
$url = array_slice(explode("/", $_SERVER['REQUEST_URI']), 1);


if (isset($_SESSION[$requestMethod][$url[0]])) {
    $_SESSION[$requestMethod][$url[0]]();
} else {
    http_response_code(400);
    echo json_encode(["erro" => "Ouve um erro ao buscar na rota", "url" => $url]);
}
