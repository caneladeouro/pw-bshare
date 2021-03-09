<?php

namespace BSHARE\WEBSERVER\CODE_CLASS;

class Projects
{
    private int $code;
    private string $title;
    private string $fileName;
    private string $description;
    private string $creationDate;
    private string $projectValue;
    private array $comment;
    private array $images;
    private array $videos;

    public function __construct(
        int $code,
        string $title,
        string $fileName,
        string $description,
        string $creationDate,
        string $projectValue,
        array $comment,
        array $images,
        array $videos
    ) {
        $args = func_get_args();

        foreach ($args as $key => $value) {
            $this->$key = $value;
        }
    }

    private function signDataInDatabase(Projects $project)
    {
        global $db;

        $sql[0] = $db->prepare(
            "INSERT INTO tb_projeto VALUE (:code, :title, :fileName, :description, :creationDate, :projectValue);"
        );
        $sql[1] = $db->prepare("INSERT INTO tb_imagem VALUE (:code, :image);");
        $sql[2] = $db->prepare(
            "INSERT INTO tb_video VALUE (:code, :video);"
        );
        $sql[3] = $db->prepare("INSERT INTO tb_comentario VALUE (:code, :comment);");

        $sql[0]->execute([
            "code" => $project->code,
            "title" => $project->title,
            "fileName" => $project->fileName,
            "description" => $project->description,
            "creationDate" => $project->creationDate,
            "projectValue" => $project->projectValue
        ]);

        foreach ($project->images as $element) {
            $sql[1]->execute([
                "code" => $element->code,
                "image" => $element->image
            ]);
        }

        foreach ($project->videos as $element) {
            $sql[2]->execute([
                "code" => $element->code,
                "image" => $element->image
            ]);
        }

        foreach ($project->comment as $element) {
            $sql[3]->execute([
                "code" => $element->code,
                "comment" => $element->comment
            ]);
        }
    }
}
