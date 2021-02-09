<?php

namespace BSHARE\CONTROLLERS;

require __DIR__ . "/.." . "/Database" . "/ConnectionDatabase.php";
require __DIR__ . "/.." . "/Models" . "/Projeto.php";

use BSHARE\MODELS\Projeto;

class ProjectController
{
    private Projeto $project;

    public function create()
    {
        global $db;

        $numberRandomProject = mt_rand(1000000, 9999999);
        $this->project = new Projeto(json_decode(file_get_contents('php://input')));
    }
}
