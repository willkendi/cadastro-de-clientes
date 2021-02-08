<?php

//Header
include_once __DIR__ . '/includes/header.php';
//Message
include_once __DIR__ . '/includes/messages.php';
require_once 'class/crudDao.php';
$crud = new Crud;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Clientes </h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Idade</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // Read (Exibindo os dados do cliente)
                $dados = $crud->read();
                foreach ($dados as $dado) :
                ?>
                    <tr>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['sobrenome']; ?></td>
                        <td><?php echo $dado['email']; ?></td>
                        <td><?php echo $dado['idade']; ?></td>
                        <td><a href="editar.php?id=<?php echo $dado['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        <td><a href="#modal<?php echo $dado['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                        
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dado['id']; ?>" class="modal">
                        
                            <div class="modal-content">
                                <h4>Opa!</h4>
                                <p>Tem certeza que deseja excluir esse cliente?</p>
                            </div>

                            <div class="modal-footer">
                                    <!-- Delete -->
                                <form action="php_action/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dado['id']; ?>">

                                    <button type="submit" name="btn-deletar" class="btn red">Sim,quero deletar</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </form>
                            </div>
                            
                        </div>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <a href="cadastrar.php" class="btn">Adicionar Cliente</a>
    </div>
</div>



<?php
//Footer
include_once __DIR__ . '/includes/footer.php';
?>