<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-relatorio'])):
    date_default_timezone_set('America/Sao_Paulo');

    $email = mysqli_escape_string($connect, $_POST['email']);
    $data = date("Y/m/d");
    $vendas = "SELECT * FROM nova_venda WHERE data_venda = '$data'";
    $array_vendas = mysqli_query($connect, $vendas);
    $soma = 0.0;

    while($valor_vendas = mysqli_fetch_array($array_vendas)):
        $vendas_float = floatval($valor_vendas['valor_venda']);
        $soma += $vendas_float; 
    endwhile;

    include_once("../php_mailer/class.phpmailer.php");
    include_once("../php_mailer/class.pop3.php");
    include_once("../php_mailer/class.smtp.php");

    include("class.phpmailer.php");
    function email($para_email, $assunto, $html) {
    $mail2 = new PHPMailer;
    $mail2->IsSMTP();

    $mail2->From = "aeoiuaeiou12@gmail.com";
    $mail2->FromName = "Allan";

    $mail2->Host       = "smtp.gmail.com";
    $mail2->Port       = 587;
    $mail2->SMTPAuth   = true;
    $mail2->Username =   "aeoiuaeiou12@gmail.com";
    $mail2->Password =   "trabson123";
        
        $mail2->AddAddress($para_email);
        $mail2->Subject = $assunto;
        
    $mail2->AltBody = "Para ver essa mensagem, use um programa compatível com HTML!";
        
        $mail2->MsgHTML($html);
    if ($mail2->Send()) {
        return "1";
    } else {
        return $mail2->ErrorInfo;
    }
    }
    $corpo_email = "<html><body><p>Olá esse é um teste de envio de e-mail</body></html>";
    $controle =  email("aeoiuaeiou12@gmail.com", "allan", "Teste de envio", $corpo_email);
    if ($controle == "1") {
        echo "Relatório Enviado!";
        header('Location: ../index.php');
    } else {
        echo $controle;
    }

    email($email, "Relatório de Vendas", $soma);
endif;
?>