<?php

namespace BSHARE\WEBSERVER\AUTOLOAD;

use BSHARE\WEBSERVER\ERROR;

spl_autoload_register(function ($propery) {
    $propery = explode("\\", $propery);

    if ($propery[1] == 'WEBSERVER') {
        switch ($propery[2]) {
            case "CONTROLLERS":
                require __DIR__ . "/Controllers" . "/$propery[3].php";
                break;
            case "CODE_CLASS":
                require __DIR__ . "/Class" . "/$propery[3].php";
                break;
            case "MODELS":
                require __DIR__ . "/Models" . "/$propery[3].php";
                break;
            default:
        }
    }
});
