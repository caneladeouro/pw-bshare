<?php

namespace BSHARE\WEBSERVER\ROUTES;

require __DIR__ . "/autoload.php";

use BSHARE\WEBSERVER\CONTROLLERS\UserController;

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
        self::set("GET", $url, $callback);
    }

    public static function put(string $url, $callback)
    {
        self::set("GET", $url, $callback);
    }

    public static function delete(string $url, $callback)
    {
        self::set("GET", $url, $callback);
    }
}

Router::get("users", UserController::showUsers());
Router::get("user", UserController::showUser());
// Router::post("user", UserController::);
// Router::post("project", $projectController->create);
// Router::put("user", $userController->update);
