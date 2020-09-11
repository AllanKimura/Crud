<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nova Venda</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>

    <body>

        <div class="row">
            <div class="col s12 m6 push-m3">
                <h3 class="light"> Adicionar Venda </h3>
                <form action="php_action/create_venda.php" method="POST">

                    <div class="input-field col s12">
                        <input type="text" name="id" id="id"/>
                        <label for="id"> ID do Vendedor </label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="valor_venda" id="valor_venda"/>
                        <label for="valor_venda"> Valor da Venda </label>
                    </div>

                    <button type="submit" name="btn-adicionar_venda" class="btn"> Concluir Venda </button>
                    <a href="index.php" class="btn green"> Lista de Vendedores </a>
                </form>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>