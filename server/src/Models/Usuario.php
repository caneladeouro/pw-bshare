<?php

namespace BSHARE\WEBSERVER\MODELS;

class Usuario
{
    private int $codigo;
    private string $nome;
    private string $senha;
    private string $email;
    private $arquivoCapa;

    public function __construct($data)
    {
        $this->nome = $data->nome;
        $this->senha = $data->senha;
        $this->email = $data->email;
        $this->arquivoCapa = $data->arquivoCapa;
    }

    public function show()
    {
        $data = [];
        foreach ($this as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }
}
