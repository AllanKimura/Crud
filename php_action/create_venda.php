<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-adicionar_venda'])):
    date_default_timezone_set('America/Sao_Paulo');
    $id = mysqli_escape_string($connect, $_POST['id']);
    $valor_venda = mysqli_escape_string($connect, $_POST['valor_venda']);
    $comissao = ($valor_venda*8.5)/100;
    $data_venda = date("Y/m/d");

    $sql = "INSERT INTO nova_venda (valor_venda, id, comissao, data_venda) VALUES ('$valor_venda', '$id', '$comissao', '$data_venda')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Venda adicionada com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao adicionar venda";
        header('Location: ../index.php');
    endif;
endif;
?>