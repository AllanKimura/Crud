<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-adicionar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);

    $sql = "INSERT INTO vendedor (nome, email) VALUES ('$nome', '$email')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../index.php');
    endif;
endif;
?>