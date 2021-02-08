<?php
//Sessão
session_start();


require_once '../class/crudDao.php';
$crud = new Crud;

if (isset($_POST['btn-editar'])) {

  if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {
    $_SESSION['mensagem'] = "Formato de idade inválido";
    header('Location:../index.php');
  } else {
    if (isset($_POST['nome'])) {
      $nome = addslashes($_POST['nome']);
      $sobrenome = addslashes($_POST['sobrenome']);
      $email = addslashes($_POST['email']);
      $idade = addslashes($_POST['idade']);
      $id = addslashes($_POST['id']);

      if ($crud->update($nome, $sobrenome, $email, $idade, $id) == true) { // Verifica se a query foi realizada com sucesso
        $_SESSION['mensagem'] = "Atualizado com sucesso!";

        header('Location:../index.php');
      } else {
        $_SESSION['mensagem'] = "Erro ao Atualizar";
        header('Location:../index.php');
      }
    }
  }
}

    // Insere os dados na tabela cliente [nome,sobrenome,email,idade] os dados das variaveis [$nome,$sobrenome,$email,$idade]
