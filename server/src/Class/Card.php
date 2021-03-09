<?php

namespace BSHARE\WEBSERVER\CODE_CLASS;

class Card
{
    private string $lastChange;
    private array $projects;

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set(Projects $project)
    {
        array_push($this->projects, $project);
    }
}
