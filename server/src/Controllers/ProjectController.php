<?php

namespace BSHARE\WEBSERVER\CONTROLLERS;

require __DIR__ . "/.." . "/autoload.php";

use BSHARE\MODELS\Projeto;

class ProjectController
{
    private Projeto $project;
    private array $sql;

    public function create()
    {
        global $db;

        $numberRandomProject = mt_rand(1000000, 9999999);
        $this->project = new Projeto(json_decode(file_get_contents('php://input')));

        $this->sql[0] = "INSERT INTO tb_projeto VALUE ($numberRandomProject, :title, :fileNameProjectDescription, :criationDate, :projectPrice, :nameProjectFile)";

        // foreach ($this->project->__get('imagem') as $element) {
        //     $numberRandomImage = mt_rand(1000000, 9999999);
        //     array_push($this->sql[1], "INSERT INTO tb_imagem VALUE ($numberRandomImage, $element)");
        // }

        // foreach ($this->project->__get('video') as $element) {
        //     $numberRandomVideo = mt_rand(1000000, 9999999);
        //     array_push($this->sql[2], "INSERT INTO tb_imagem VALUE ($numberRandomVideo, $element)");
        // }

        echo json_encode($this->sql);
    }
}
