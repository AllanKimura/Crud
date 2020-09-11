<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vendas</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>

    <body>
        <?php
        include_once 'php_action/db_connect.php';

        include_once 'includes/message.php';
        ?>

        <div class="row">
            <div class="col s12 m6 push-m3">
                <h3 class="light"> Vendedores </h3>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>ID:</th>
                            <th>Nome:</th>
                            <th>Email:</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM vendedor";
                        $resultado = mysqli_query($connect, $sql);

                        if(mysqli_num_rows($resultado) > 0):

                        while($dados = mysqli_fetch_array($resultado)):
                        ?>
                        <tr>
                            <td><?php echo $dados['id']; ?></td>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><?php echo $dados['email']; ?></td>
                            <td> <a href="editar.php?id=<?php echo $dados['id']; ?>" data-position="top" data-tooltip="Editar" class="btn-floating orange tooltipped"><i class="material-icons">edit</i></a></td>
                            <td> <a href="#modal<?php echo $dados['id']; ?>" data-position="top" data-tooltip="Excluir" class="btn-floating red modal-trigger tooltipped"><i class="material-icons">delete</i></a></td>
                            <td> <a href="total_vendas.php?id=<?php echo $dados['id']; ?>" data-position="top" data-tooltip="Total de vendas" class="btn-floating green tooltipped"><i class="material-icons">attach_money</i></a></td>
                            <div id="modal<?php echo $dados['id']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Deletar</h4>
                                    <p>Tem certeza que deseja excluir esse vendedor?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="php_action/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                        <button type="submit" name="btn-deletar" class="btn red"> Excluir</button>
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                        </tr>
                        <?php
                        endwhile;
                        else: ?>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        <?php
                        endif;
                         ?>
                    </tbody>
                </table>
                <br>
                <a href="adicionar.php" class="btn"> Adicionar Vendedor </a> 
                <a href="venda.php" class="btn green "> Adicionar Venda </a>
                <a href="relatorio.php" class="btn blue right"> Relatório de vendas </a>  
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            M.AutoInit();
        </script>
    </body>
</html>