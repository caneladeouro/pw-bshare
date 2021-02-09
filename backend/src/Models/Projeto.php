<?php

namespace BSHARE\MODELS;

class Projeto
{
    private int $codigo;
    private string $titulo;
    private string $nomeArquivoProjeto;
    private string $nomeArvquivoDescricao;
    private string $dataCriacao;
    private string $valorProjeto;
    private array $comentario;
    private array $imagem;
    private array $video;

    public function __construct($data)
    {
        $this->titulo = $data['titulo'];
        $this->nomeArquivoProjeto = $data['nomeArquivoProjeto'];
        $this->nomeArvquivoDescricao = $data['nomeArvquivoDescricao'];
        $this->dataCriacao = date('Y-m-d');
        $this->valorProjeto = $data['valorProjeto'];

        foreach ($data['comentario'] as $element) {
            array_push($this->comentario, $element);
        }

        foreach ($data['imagem'] as $element) {
            array_push($this->imagem, $element);
        }

        foreach ($data['video'] as $element) {
            array_push($this->video, $element);
        }
    }
}
