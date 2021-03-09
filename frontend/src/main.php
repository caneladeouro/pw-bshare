<?php

namespace BSHARE\FRONTEND;

require __DIR__ . "/routes.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];
$url = array_slice(explode("/", $_SERVER['REQUEST_URI']), 1);


if (isset($_SESSION["callbacks"][$requestMethod][$url[0]])) {
    $_SESSION["callbacks"][$requestMethod][$url[0]]();
} else {
    http_response_code(400);
    echo json_encode(["erro" => "Ouve um erro ao buscar na rota", "url" => $url[0]]);
};
