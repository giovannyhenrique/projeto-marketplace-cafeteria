<?php

require "src/conexaoBD.php";
require "src/modelo/Produto.php";
require "src/repositorio/ProdutoRepositorio.php";

$produtosRepositorio = new ProdutoRepositorio($pdo);

$dadosSegmentoCafe = $produtosRepositorio->produtosCafe();

$dadosSegmentoLanche = $produtosRepositorio->produtosLanche();

$dadosSegmentoAlmoco = $produtosRepositorio->produtosAlmoco();

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Mama'S Baking - Cardápio</title>
</head>

<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <a href="admin.php">
                    <img src="img/logo-mama-baking.png" class="logo" alt="logo-mama-baking">
                </a>
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Mais que um simples Cafézinho</h3>
                <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach ($dadosSegmentoCafe as $cafe) : ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $cafe->getCaminhoImg() ?>">
                        </div>
                        <p><?php echo $cafe->getNome() ?></p>
                        <p><?php echo $cafe->getDescricao() ?></p>
                        <p><?= $cafe->getPrecoFormat() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções requintadas para acompanhar seu café</h3>
                <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach ($dadosSegmentoLanche as $lanche) : ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $lanche->getCaminhoImg() ?>">
                        </div>
                        <p><?php echo $lanche->getNome() ?></p>
                        <p><?php echo $lanche->getDescricao() ?></p>
                        <p><?= $lanche->getPrecoFormat() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Pratos feitos com diversidade de sabores</h3>
                <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach ($dadosSegmentoAlmoco as $almoco) : ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $almoco->getCaminhoImg() ?>">
                        </div>
                        <p><?php echo $almoco->getNome() ?></p>
                        <p><?php echo $almoco->getDescricao() ?></p>
                        <p><?= $almoco->getPrecoFormat() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </main>
</body>

</html>