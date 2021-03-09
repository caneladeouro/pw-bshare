<?php

namespace BSHARE\MODELS;

class Projeto
{
    protected int $codigo;
    protected string $titulo;
    protected string $nomeArquivoProjeto;
    protected string $nomeArvquivoDescricao;
    protected string $dataCriacao;
    protected string $valorProjeto;
    protected array $imagem;
    protected array $video;

    public function __construct($data)
    {
        $this->titulo = $data->titulo;
        $this->nomeArquivoProjeto = $data->nomeArquivoProjeto;
        $this->nomeArvquivoDescricao = $data->nomeArvquivoDescricao;
        $this->dataCriacao = date('Y-m-d');
        $this->valorProjeto = $data->valorProjeto;

        // foreach ($data->imagem as $element) {
        //     array_push($this->imagem, $element);
        // }

        // foreach ($data->video as $element) {
        //     array_push($this->video, $element);
        // }
    }

    public function getAttribute($key, $fallback = null)
    {
        return (isset($this->attributes[$key])) ?
            $this->attributes[$key] : $fallback;
    }

    public function __get($key)
    {
        return $this->getAttribute($key);
    }
}
