<?php
session_start();
require_once './php_action/db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

require './vendor/phpmailer/autoload.php';

date_default_timezone_set('America/Sao_Paulo');
    try {
        
        $email = mysqli_escape_string($connect, $_POST['email']);
        $data = date("Y/m/d");
        $vendas = "SELECT * FROM nova_venda WHERE data_venda = '$data'";
        $array_vendas = mysqli_query($connect, $vendas);
        $soma = 0.0;

        while($valor_vendas = mysqli_fetch_array($array_vendas)):
            $vendas_float = floatval($valor_vendas['valor_venda']);
            $soma += $vendas_float; 
        endwhile;
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'aeoiuaeiou12@gmail.com';                     // SMTP username
        $mail->Password   = 'trabson123';                               // SMTP password
        $mail->SMTPSecure =  "tls";       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->SMTPAuth = true;
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('aeiouaeiou12@gmail.com', 'Allan');
        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Relatorio de vendas do dia';
        $mensagem = "<p>O total de vendas do dia foi:  $soma </p>";
        $mail->Body    = $mensagem;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $_SESSION['mensagem'] = "O relatório foi enviado!";
        header('Location: ../index.php');
    } catch (Exception $e) {
        echo "Erro: {$mail->ErrorInfo}";
    }

?>