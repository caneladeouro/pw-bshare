<?php

namespace BShare\FRONTEND\Routes;

use BShare\FRONTEND\VALIDATE_AND_INIT_SESSION\Validate;

require __DIR__ . "/validateAndInitSession.php";

class Router
{
    private static function set(string $typeVerb, string $url, $callback)
    {
        $_SESSION["callbacks"][$typeVerb]["$url"] = $callback;
    }

    public static function get(string $url, $callback)
    {
        self::set("GET", $url, $callback);
    }

    public static function post(string $url, $callback)
    {
        self::set("POST", $url, $callback);
    }
}

$url = array_slice(explode("/", $_SERVER['REQUEST_URI']), 1);

Router::get("img", function () {
    global $url;

    header('Content-Type: image/png');
    require __DIR__ . "/img" . "/$url[1]";
});

Router::get("img-icon", function () {
    global $url;

    header('Content-Type: image/x-icon');
    require __DIR__ . "/img" . "/$url[1]";
});

Router::get("css", function () {
    global $url;

    header('Content-Type: text/css');
    require __DIR__ . "/css" . "/$url[1]";
});

Router::get("js", function () {
    global $url;

    header('Content-Type: text/js');
    require __DIR__ . "/js" . "/$url[1]";
});

Router::get("site", function () {
    global $url;

    require __DIR__ . "/pages/$url[1].php";
});

Router::post("site", function () {
    global $url;

    if (isset($_POST['usuario-email'], $_POST['senha'])) {
        Validate::validateAndInitSession();
    } elseif (isset($_POST['usuario'], $_POST['senha'], $_POST['email'])) {
        Validate::registerUser();
    } else {
        require __DIR__ . "/pages" . "/login.php";
    }

    require __DIR__ . "/pages/$url[1].php";
});
