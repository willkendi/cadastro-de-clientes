<?php

session_start();
require_once '../class/crudDao.php';
$crud = new  Crud;

if (isset($_POST['btn-deletar'])) {
    if (isset($_POST['id'])) {
        $id = addslashes($_POST['id']);

        var_dump($id);

        if ($crud->delete($id) == true) { // Verifica se a query foi realizada com sucesso
            $_SESSION['mensagem'] =  "Deletado com sucesso!";
            header('Location:../index.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Deletar";
            header('Location:../index.php');
        }
    }
}
