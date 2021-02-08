
<?php
//Sessão
session_start();
if(isset($_SESSION['mensagem'])):?>
  
    <script>
    window.onload = function(){// On load serve pra carregar após toda pagina ser carregada
        M.toast({html: ' <?php echo $_SESSION['mensagem'];?>'})
    }
    </script>
    <?php
endif;
session_unset();
?>