<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Novo vendedor</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>

    <body>

        <div class="row">
            <div class="col s12 m6 push-m3">
                <h3 class="light"> Adicionar Vendedor </h3>
                <form action="php_action/create.php" method="POST">

                    <div class="input-field col s12">
                        <input type="text" name="nome" id="nome"/>
                        <label for="nome"> Nome </label>
                    </div>

                    <div class="input-field col s12">
                        <input type="email" name="email" id="email"/>
                        <label for="email"> Email </label>
                    </div>

                    <button type="submit" name="btn-adicionar" class="btn"> Adicionar </button>
                    <a href="index.php" class="btn green"> Lista de Vendedores </a>
                </form>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>