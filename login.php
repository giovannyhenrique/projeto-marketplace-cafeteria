<?php

require "src/conexaoBD.php";
require "src/modelo/Produto.php";
require "src/usuario/User.php";
require "src/usuario/UsuariosList.php";
require "src/repositorio/ProdutoRepositorio.php";

$verificarUser = new UsuariosList($pdo);

if (isset($_POST['validar-usuario'])) {
  $usuario = new User(
    null,
    $_POST['email'],
    $_POST['password']
  );

  $usuarioList = new UsuariosList($pdo);
  $email = isset($_POST["email"]);
  $password = isset($_POST["password"]);

  if (!$email || !$password) {
    $msg = "Você deve digitar sua senha e login!";
  } else {
    $msg = "";
  }

  if (isset($_POST['validar-usuario'])) {
    $usuario = new User($_POST['id'], $_POST['email'], $_POST['password']);
    if ($usuarioList->verificarUser($usuario)) {
      header("Location: admin.php");
    }
  }else {
    $msg = "E-mail ou Senha não cadastrado";
  }
}


?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Mama'S Baking - Login</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <img src="img/logo-mama-baking.png" class="logo-admin" alt="logo-mama-baking">
      <h1>Login Mama-s Baking</h1>
      <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
      <form action="User.php">

        <label for="email">E-mail</label>
        <input type="email" id="email" placeholder="Digite o seu e-mail" required>

        <label for="password">Senha</label>
        <input type="password" id="password" placeholder="Digite a sua senha" required>

        <input name="validar-usuario" type="submit" class="botao-cadastrar" value="Entrar" />
        <input name="cadastrar-usuario" type="submit" class="botao-cadastrar" value="Registrar" />
        <h4><? $msg ?></h4>
      </form>
    </section>
  </main>
</body>

</html>