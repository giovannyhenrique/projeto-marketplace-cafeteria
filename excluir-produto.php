<?php

require "src/modelo/Produto.php";
require "src/conexaoBD.php";
require "src/repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produtoRepositorio->deletarProduto($_POST['id']);

header("Location: admin.php");

?>