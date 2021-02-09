<?php

namespace BSHARE;

include __DIR__ . "/Controllers" . "/UserController.php";

use BSHARE\CONTROLLERS\UserController;

// header('Content-Type: aplication/json');

$userController = new UserController;
$requestMethod = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

function verbGet()
{
    global $userController;
    global $url;
    $id = (isset($_REQUEST['id']) ? $_REQUEST['id'] : null);

    switch ($url) {
        case "/users":
            $userController->showUsers();
        case "/user?id=$id":
            $userController->showUser();
            break;
        default:
            http_response_code(404);
            echo json_encode(["erro" => "Ouve um erro ao buscar na rota", "url" => $url]);
    }
};

function verbPost()
{
    global $userController;
    global $url;

    switch ($url) {
        case "/user":
            $userController->create();
            break;
        default:
            http_response_code(404);
            echo "Erro: url incorreta";
            echo "<br>" . $url;
    }
};

function verbPut()
{
    global $userController;
    global $url;
    $id = (isset($_REQUEST['id']) ? $_REQUEST['id'] : null);

    switch ($url) {
        case "/user?id=$id":
            $userController->update();
            break;
        default:
            http_response_code(404);
            echo json_encode(["erro" => "Ouve um erro ao buscar na rota", "url" => $url]);
    }
};

function verbDelete()
{
};

switch ($requestMethod):
    case "GET":
        verbGet();
        break;
    case "POST":
        verbPost();
        break;
    case "PUT":
        verbPut();
        break;
    case "DELETE":
        verbDelete();
        break;
    default:
        http_response_code(404);
endswitch;
