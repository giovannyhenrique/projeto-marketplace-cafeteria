<?php

require "src/conexaoBD.php";
require "src/modelo/Produto.php";
require "src/repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produtos = $produtoRepositorio->buscarTodosProdutos();

?>
<style>
    img{
        align-items: center;
    }

    table {
        width: 90%;
        margin: auto;
    }

    h1{
        text-align: center;
    }
    table,
    th,
    td {
        border: 1px solid #000;
    }

    table th {
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr {
        border: 1px solid #000;
    }

    table td {
        font-size: 18px;
        padding: 8px;
    }

    .container-admin-banner h1 {
        margin-top: 40px;
        font-size: 30px;
    }
</style>
<img src="img/logo-mama-baking.png" alt="">
<h1>Cardápio Atual</h1>
<table>
    <thead>
        <tr>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Descricão</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $produto) : ?>
            <tr>
                <td><?= $produto->getNome() ?></td>
                <td><?= $produto->getTipo() ?></td>
                <td><?= $produto->getDescricao() ?></td>
                <td><?= $produto->getPrecoFormat() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>