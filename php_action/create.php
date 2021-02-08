<?php
session_start();
require_once '../class/crudDao.php';
$crud = new Crud;
if (isset($_POST['btn-cadastrar'])) {

  if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {
    $_SESSION['mensagem'] = "Formato de idade inválido";
    header('Location:index.php');
  } else {
    $nome = addslashes($_POST['nome']);
    $sobrenome = addslashes($_POST['sobrenome']);
    $email = addslashes($_POST['email']);
    $idade = addslashes($_POST['idade']);
    if ($crud->create($nome, $sobrenome, $email, $idade) == true) {

      $_SESSION['mensagem'] = "Cadastrado com sucesso!";
      header('Location:../index.php');
    } else {
      $_SESSION['mensagem'] = "Erro ao cadastrar";
      header('Location:../index.php');
    }
  }
}
