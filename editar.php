<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Vendedor</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>

    <body>
    <?php
        include_once 'php_action/db_connect.php';

        if(isset($_GET['id'])):
            $id = mysqli_escape_string($connect, $_GET['id']);

            $sql = "SELECT * FROM vendedor WHERE id = '$id'";
            $resultado = mysqli_query($connect, $sql);
            $dados = mysqli_fetch_array($resultado);
        endif;
        ?>
        <div class="row">
            <div class="col s12 m6 push-m3">
                <h3 class="light"> Editar Vendedor </h3>
                <form action="php_action/update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $dados['id'];?>"/>
                    <div class="input-field col s12">
                        <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>"/>
                        <label for="nome"> Nome </label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="email" id="email" value="<?php echo $dados['email']; ?>"/>
                        <label for="email"> Email </label>
                    </div>

                    <button type="submit" name="btn-editar" class="btn"> Atualizar </button>
                    <a href="index.php" class="btn green"> Lista de Vendedores </a>
                </form>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>