<?php

class UsuariosList
{
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
        return new User(
            $dados['id'],
            $dados['email'],
            $dados['password']
        );
    }

    public function verificarUser(User $user)
    {
        $sql = "SELECT * FROM usuarios WHERE email = " . $user->getEmail() . "";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $count = $statement->rowCount();
        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        if ($count) {
            return true;
        }
        return false;
    }
}
