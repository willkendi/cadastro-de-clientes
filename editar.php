<?php

//Header
include_once __DIR__ . '/includes/header.php';
require_once 'class/crudDao.php';
$crud  = new Crud;

if (isset($_GET['id'])) :
    $id = addslashes($_GET['id']);

    $dados = $crud->mostrarDados($id);

    foreach ($dados as $dado) :
?>

        <div class="row">

            <div class="col s12 m6 push-m3">
                <h3 class="light">Editar Cliente</h3>
                <form action="php_action/update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $dado['id']; ?>">
                    <div class="input-field col s12">
                        <input type="text" name="nome" id="nome" value="<?php echo $dado['nome']; ?>">
                        <label for="nome">Nome</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dado['sobrenome']; ?>">
                        <label for="sobrenome">Sobrenome</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="email" id="email" value="<?php echo $dado['email']; ?>">
                        <label for="email">Email</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="idade" id="idade" value="<?php echo $dado['idade']; ?>">
                        <label for="idade">Idade</label>
                    </div>
                    <button type="submit" name="btn-editar" class="btn">Atualizar</button>
                    <a href="index.php" class="btn green">Lista de clientes</a>
                </form>

            </div>
        </div>


<?php
    endforeach;
endif;
//Footer
include_once __DIR__ . '/includes/footer.php';
?>