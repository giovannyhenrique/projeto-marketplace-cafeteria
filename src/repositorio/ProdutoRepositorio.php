<?php

class ProdutoRepositorio{
    
    private PDO $pdo;
    /**
     * @param PDO $pdo
     */


    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Produto($dados['id'],
        $dados['tipo'], 
        $dados['nome'], 
        $dados['descricao'], 
        $dados['preco'],
        $dados['imagem']);

    }

    public function produtosCafe():array
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'cafe' ORDER BY preco";
        $statement = $this->pdo->query($sql1);
        $produtosCafe = $statement->fetchAll(mode:PDO::FETCH_ASSOC);

        $dadosSegmentoCafe = array_map(function ($cafe){
            return $this->formarObjeto($cafe);
        }, $produtosCafe);
        
        return $dadosSegmentoCafe;
    }

    public function produtosLanche():array
    {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'lanche' ORDER BY preco";
        $statement = $this->pdo->query($sql2);
        $produtosLanche = $statement->fetchAll(mode:PDO::FETCH_ASSOC);

        $dadosSegmentoLanche = array_map(function ($lanche){
            return $this->formarObjeto($lanche);
        }, $produtosLanche);

        return $dadosSegmentoLanche;
    }

    public function produtosAlmoco():array
    {
        $sql3 = "SELECT * FROM produtos WHERE tipo = 'almoço' ORDER BY preco";
        $statement = $this->pdo->query($sql3);
        $produtosAlmoco = $statement->fetchAll(mode:PDO::FETCH_ASSOC);

        $dadosSegmentoAlmoco = array_map(function ($almoco){
            return $this->formarObjeto($almoco);
        }, $produtosAlmoco);

        return $dadosSegmentoAlmoco;
    }

    public function buscarTodosProdutos()
    {
        $sql = "SELECT * FROM  produtos ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(mode: PDO::FETCH_ASSOC);

        $todosProdutos = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$dados);

        return $todosProdutos;
    }

    public function deletarProduto(int $id)
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function salvarProduto(Produto $produto)
    {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getPreco());
        $statement->bindValue(5, $produto->getImagem());
        $statement->execute();
    }

    public function buscarProduto(int $id)
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);

    }

    public function atualizarProduto(Produto $produto)
{
    $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $produto->getTipo());
    $statement->bindValue(2, $produto->getNome());
    $statement->bindValue(3, $produto->getDescricao());
    $statement->bindValue(4, $produto->getPreco());
    $statement->bindValue(5, $produto->getImagem());
    $statement->bindValue(6, $produto->getId());
    $statement->execute();
}


}
?>