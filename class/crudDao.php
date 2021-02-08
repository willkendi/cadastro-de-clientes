<?php
require_once 'db_connect.php';
class Crud
{

    private $con;
    public function __construct()
    {
        $this->con = Conexao::getConn();
    }

    public function create($nome, $sobrenome, $email, $idade)
    {
        try{    
        $stmt = $this->con->prepare("INSERT INTO clientes(nome, sobrenome, email, idade) VALUES(:nome,:sobrenome,:email,:idade)");
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':sobrenome', $sobrenome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':idade', $idade);
        $stmt->execute();
        return true;
        }
        catch (PDOException $erro_1) {
            echo 'erro' . $erro_1->getMessage();
            return false;
        }
    }

    public function read()
    {

        $stmt = $this->con->prepare("SELECT * FROM clientes");
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function mostrarDados($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM clientes  WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function update($nome, $sobrenome, $email, $idade, $id)
    {
        try {
            $stmt = $this->con->prepare("UPDATE clientes SET nome = :nome, sobrenome = :sobrenome, email = :email, idade = :idade WHERE id = :id");
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':sobrenome', $sobrenome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':idade', $idade);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $erro_2) {
            echo 'erro' . $erro_2->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->con->prepare("DELETE FROM clientes WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $erro_3) {
            echo 'erro' . $erro_3->getMessage();
            return false;
        }
    }
}
