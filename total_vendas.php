<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Total de Vendas</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>

    <body>
        <?php
        include_once 'php_action/db_connect.php';
            $id = mysqli_escape_string($connect, $_GET['id']);
            $sql = "SELECT * FROM vendedor  WHERE id = '$id'";
            $vendas = "SELECT * FROM nova_venda  WHERE id = '$id'";
            $resultado = mysqli_query($connect, $sql);
            $info_vendas = mysqli_query($connect, $vendas);
            $dados = mysqli_fetch_array($resultado);
        ?>

        <div class="row">
            <div class="col s12 m6 push-m3">
                <h3 class="light"> Total de vendas de <?php echo $dados['nome'] ?> </h3>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>ID:</th>
                            <th>Nome:</th>
                            <th>Email:</th>
                            <th>Comissão:</th>
                            <th>Valor:</th>
                            <th>Data:</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        if(mysqli_num_rows($resultado) > 0):
                        while($dados_vendas = mysqli_fetch_array($info_vendas)):
                        ?>
                        <tr>
                            <td><?php echo $dados['id']; ?></td>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><?php echo $dados['email']; ?></td>
                            <td><?php echo $dados_vendas['comissao']; ?></td>
                            <td><?php echo $dados_vendas['valor_venda']; ?></td>
                            <td><?php echo $dados_vendas['data_venda']; ?></td>
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
                <a href="venda.php" class="btn"> Adicionar Venda </a> 
                <a href="index.php" class="btn green"> Lista de Vendedores </a> 
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>