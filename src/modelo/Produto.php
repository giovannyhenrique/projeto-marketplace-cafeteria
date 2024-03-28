<?php

class Produto{
    private ?int $id;
    private string $tipo;
    private string $nome;
    private string $descricao;
    private float $preco;
    private string $imagem;

    public function __construct(?int $id, string $tipo, string $nome, string $descricao, float $preco, string $imagem = "logo-mama-baking.png")
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->imagem = $imagem;
    }

    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }


    public function getPreco(): float
    {   
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }


    public function getPrecoFormat(): string
    {   
        return "R$ ". number_format($this->preco, 2);
    }

    public function getCaminhoImg(): string
    {   
        return "img/".$this->imagem;
    }

}

?>